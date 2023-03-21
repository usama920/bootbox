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
            <div class="border-gray-400 rounded p-4 lg:w-1/2 bg-white border-2">
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
            <div class="flex justify-end p-4">
                <button @click="socialSave()" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
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

const social = ref({contact_email:'', contact_number:'', social_facebook:'', social_instagram:'', social_twitter:'', social_email:'', question_text:'', questions:[{question:'', answer:'', id:''}]}),
    disable = ref(false)

const addQuestion = () =>{
    social.value.questions.push({question:'', answer:'', id:''})
}

const removeQuestion = (key) =>{
    social.value.questions.splice(key, 1);
}

const socialSave = () =>{
    disable.value = true
    axios
        .post('/save-social', social.value)
        .then((response)=>{
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
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
            if (!!response?.data?.data1)
                social.value = response.data.data1
            if (!!response?.data?.data2)
                social.value.questions = response?.data?.data2
        })
}
onMounted(()=>{
    showSocial()
})
</script>
