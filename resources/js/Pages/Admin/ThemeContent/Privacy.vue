<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between px-4 pb-2">
            <div class="text-[25px]">Privacy Page Content</div>
        </div>
        <form class="px-4 text-lg">
            <div class="border-gray-400 rounded p-4 bg-white border-2">
                <div>
                    <label class="font-normal text-base">Heading:</label>
                    <input v-model="privacy.heading" type="text" class="w-full rounded" autocomplete="off" placeholder="...">
                </div>
                <div>
                    <label class="font-normal text-base">Description:</label>
                    <input v-model="privacy.description" type="text" class="w-full rounded" autocomplete="off" placeholder="..."/>
                </div>
                <div>
                    <label class="font-normal text-base">Image:</label>
                    <input @change="imgPrivacy($event)" type="file" class="w-full border p-1 border-gray-500 rounded" />
                </div>
            </div>
            <div class="flex justify-end p-4">
                <button @click="privacySave(privacy)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
            </div>
        </form>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const privacy = ref({image:'', heading:'', description:'', previous_img:''}),
    disable = ref(false)

const imgPrivacy = (e) =>{
    privacy.value.image = e.target.files[0]
}

const privacySave = (post) =>{
    disable.value = true
    const formData = new FormData();
    for (let item in post) {
        if(post.hasOwnProperty(item)) {
            console.log(item, post[item])
            if(item === "heading" || item === "description") {
                formData.append(item,  JSON.stringify(post[item]));
            } else {
                formData.append(item, post[item]);
            }
        }
    }
    axios
        .post('/save-privacy', formData , {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then((response) => {
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
                showPrivacy()
            }
        }).finally(()=>{
        disable.value = false
    })
}

const showPrivacy = () =>{
    axios
        .get('/save-privacy')
        .then((response)=>{
            privacy.value = !!response.data?.data ? response.data?.data: {image:'', heading:'', description:'', previous_img:''}
            privacy.value.previous_img = !!response.data.data?.image ? response.data.data?.image:''
        });
}
onMounted(()=>{
    showPrivacy()
})
</script>
