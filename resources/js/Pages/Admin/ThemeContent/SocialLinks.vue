<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between px-4 pb-2">
            <div class="text-[25px]">Social Links and Home Page Content</div>
        </div>
        <form class="px-4 text-lg">
            <div class="lg:grid-cols-2 lg:grid">
                <div class="border-gray-400 rounded p-4 bg-white border-2">
                    <div class="font-bold">Footer Social Accounts</div>
                    <div>
                        <label class="font-normal text-base">Facebook Account:</label>
                        <input v-model="social.social_facebook" type="text" class="w-full rounded" autocomplete="off" placeholder="/facebook"/>
                    </div>
                    <div>
                        <label class="font-normal text-base">Instagram Account:</label>
                        <input v-model="social.social_instagram" type="text" class="w-full rounded" autocomplete="off" placeholder="/instagram"/>
                    </div>
                    <div>
                        <label class="font-normal text-base">Twitter Account:</label>
                        <input v-model="social.social_twitter" type="text" class="w-full rounded" autocomplete="off" placeholder="/twitter"/>
                    </div>
                    <div>
                        <label class="font-normal text-base">Email Account:</label>
                        <input v-model="social.social_email" type="text" class="w-full rounded" autocomplete="off" placeholder="example@example.com"/>
                    </div>
                </div>
                <div class="border-gray-400 rounded p-4 bg-white border-2">
                    <div class="font-bold">Footer Contact Detail</div>
                    <div>
                        <label class="font-normal text-base">Contact Email:</label>
                        <input v-model="social.contact_email" type="text" class="w-full rounded" autocomplete="off" placeholder="example@example.com">
                    </div>
                    <div>
                        <label class="font-normal text-base">Contact Number:</label>
                        <input v-model="social.contact_number" type="text" class="w-full rounded" autocomplete="off" placeholder=" (02) 123-4567"/>
                    </div>
                </div>
            </div>
            <div class="lg:grid-cols-2 lg:grid">

                <div class="border-gray-400 rounded p-4 bg-white border-2">
                    <div class="font-bold">Text before Question & Answers</div>
                    <textarea v-model="social.question_text" rows="5" type="text" class="w-full rounded" autocomplete="off" placeholder="......."></textarea>
                    <div class="font-bold">Question & Answers</div>
                    <div v-for="(data,key) in social.questions">
                        <div>
                            <div class="flex justify-between items-center my-1">
                                <label class="font-normal text-base">Question:</label>
                                <i @click="removeQuestion(key)" v-if="social.questions.length > 1" class="font-bold p-2 cursor-pointer rounded text-center text-[20px] bg-red-500 hover:bg-red-600 fas fa-minus text-white"></i>
                            </div>
                            <input v-model="social.questions[key]['question']" type="text" class="w-full rounded" autocomplete="off" placeholder="??"/>
                        </div>
                        <div>
                            <label class="font-normal text-base">Answer:</label>
                            <textarea v-model="social.questions[key]['answer']" rows="5" type="text" class="w-full rounded" autocomplete="off" placeholder="............."></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <i @click="addQuestion()" class="font-bold p-2 cursor-pointer rounded text-[20px] bg-green-500 hover:bg-green-600 fas fa-plus text-white"></i>
                    </div>
                </div>
                <div class="border-gray-400 rounded p-4 bg-white border-2">
                    <div class="font-bold">Home Page Slider Images</div>
                    <div class="font-bold text-sm"> (Images must be landscape with minimum height of 700px)</div>
                    <div>
                        <input @change="changeImage($event)" accept="image/*" type="file" multiple class="w-full border-gray-500 border p-0.5 mb-1 rounded" />
                    </div>
                    <div v-if="urlGroup.length !== 0" v-for="(img, key) in urlGroup">
                        <div class="flex justify-end">
                            <i @click="removeImage(key)" class="fas fa-times cursor-pointer hover:text-white hover:bg-red-500 text-red-500 border-2 border-red-500 px-2 py-[5px] -mr-3 -mb-4 z-10 bg-white rounded-full"></i>
                        </div>
                        <img alt="image" :src="img" class="p-2">
                    </div>
                    <div v-else v-for="info in social.previous_images">
                        <img alt="image" :src="'/storage/images/slider/'+info.image" class="p-2">
                    </div>
                </div>
            </div>
            <div class="flex justify-end p-4">
                <button type="button" @click="socialSave(social)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
            </div>
        </form>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const social = ref({previous_images:[], contact_email:'', contact_number:'', social_facebook:'', social_instagram:'', social_twitter:'', social_email:'', question_text:'', questions:[{question:'', answer:'', id:''}], images:[]}),
    disable = ref(false),
    urlGroup =  ref([])


const changeImage = (e) =>{
    _.forEach(e.target.files, function(value, key) {
        social.value.images.push(value)
        urlGroup.value.push(URL.createObjectURL(value))
    });
}

const removeImage = (key) =>{
    if(key !== ''){
        urlGroup.value.splice(key, 1)
        social.value.images.splice(key, 1)
    }
}

const addQuestion = () =>{
    social.value.questions.push({question:'', answer:'', id:''})
}

const removeQuestion = (key) =>{
    social.value.questions.splice(key, 1);
}


const socialSave = (post) =>{
    disable.value = true

    const formData = new FormData();
    for (let item in post) {
        if(post.hasOwnProperty(item)) {
            if (item === "images"){
                if (post['images'] != '') {
                    let index = 1
                    _.forEach(post[item], function (value, key) {
                        const length = key + 1
                        formData.append('image' + length, value);
                        index = key
                    })
                    formData.append('length', JSON.stringify(index + 1));
                }
            }else{
                formData.append(item,  JSON.stringify(post[item]));
            }

        }
    }
    axios
        .post('/save-social', formData,{
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then((response)=>{
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
                router.visit('/social-links')
                showSocial()
            }
        }).finally(()=>{
        disable.value = false
    })
}

const showSocial = () =>{
    axios
        .get('/save-social')
        .then((response)=>{
            urlGroup.value=[]
            if (!!response?.data?.data1)
                social.value = response.data.data1
            if (!!response?.data?.data2)
                social.value.questions = response?.data?.data2
            if (!!response?.data?.data3 && response?.data?.data3?.length > 0)
                social.value.previous_images = response?.data?.data3
            else
                social.value.previous_images = []
            social.value.images = []
        })
}
onMounted(()=>{
    showSocial()
})
</script>
