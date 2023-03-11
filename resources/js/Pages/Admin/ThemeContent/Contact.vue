<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between px-4 pb-2">
            <div class="text-[25px]">Contact Page Content</div>
        </div>
        <form class="px-4 text-lg">
            <div class="border-gray-400 rounded p-4 bg-white border-2">
                <div>
                    <label class="font-normal text-base">Contact Email:</label>
                    <input v-model="contact.email" type="text" class="w-full rounded" autocomplete="off" placeholder="example@example.com">
                    <label class="font-normal text-base">Email Text:</label>
                    <input v-model="contact.email_text" type="text" class="w-full rounded" autocomplete="off" placeholder="example@example.com">
                </div>
                <div>
                    <label class="font-normal text-base">Contact Number:</label>
                    <input v-model="contact.phone" type="text" class="w-full rounded" autocomplete="off" placeholder="..."/>
                    <label class="font-normal text-base">Number Text:</label>
                    <input v-model="contact.phone_text" type="text" class="w-full rounded" autocomplete="off" placeholder="example@example.com">
                </div>
            </div>
            <div class="flex justify-end p-4">
                <button @click="aboutSave()" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
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

const contact = ref({phone_text:'', phone:'', email_text:'', email:''}),
    disable = ref(false)

const aboutSave = () =>{
    disable.value = true
    axios
        .post('/save-contact', contact.value)
        .then((response)=>{
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
                showContact()
            }
        }).finally(()=>{
        disable.value = false
    })
}

const showContact = () =>{
    axios
        .get('/save-contact')
        .then((response)=>{
            contact.value = response.data.data
        })
}
onMounted(()=>{
    showContact()
})
</script>
