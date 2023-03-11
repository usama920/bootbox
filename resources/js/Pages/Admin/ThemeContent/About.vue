<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between px-4 pb-2">
            <div class="text-[25px]">About Page Content</div>
        </div>
        <form class="px-4 text-lg">
            <div class="border-gray-400 rounded p-4 bg-white border-2">
                <div>
                    <label class="font-normal text-base">Heading:</label>
                    <input v-model="about.heading" type="text" class="w-full rounded" autocomplete="off" placeholder="...">
                </div>
                <div>
                    <label class="font-normal text-base">Description:</label>
                    <input v-model="about.description" type="text" class="w-full rounded" autocomplete="off" placeholder="..."/>
                </div>
                <div>
                    <label class="font-normal text-base">Image:</label>
                    <input @change="imgAbout($event)" type="file" class="w-full border p-1 border-gray-500 rounded" />
                </div>
            </div>
            <div class="flex justify-end p-4">
                <button @click="aboutSave(about)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
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

const about = ref({image:'', heading:'', description:'', previous_img:''}),
    disable = ref(false)

const imgAbout = (e) =>{
    about.value.image = e.target.files[0]
}

const aboutSave = (post) =>{
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
        .post('/save-about', formData , {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then((response) => {
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
                showAbout()
            }
        }).finally(()=>{
        disable.value = false
    })
}

const showAbout = () =>{
    axios
        .get('/save-about')
        .then((response)=>{
            about.value = response.data?.data
            about.value.previous_img = !!response.data.data?.image ? response.data.data?.image:''
        })
}
onMounted(()=>{
    showAbout()
})
</script>
