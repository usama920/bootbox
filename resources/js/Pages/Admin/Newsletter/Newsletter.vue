<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Newsletter Email Content</div>
        </div>
        <textarea v-model="news.newsContent" rows="5" type="text" class="w-full rounded" autocomplete="off" placeholder="............."></textarea>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Send Email</div>
        </div>
        <div class="flex flex-col overflow-x-auto">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead>
                            <tr class="border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    #No
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Emails
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(news,key) in news_letter?.data" :key="news?.id" class="text-gray-700">
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ news?.email }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center space-x-2 text-white mx-auto">
                                        <button :class="{'opacity-50':disable}" :disabled="disable" @click="sendEmail(news?.email)" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">Send Email</button>
                                        <button @click="deleteContact(news?.id)" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-if="news_letter?.data?.length !== 0" class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="news_letter?.links" />
                        </div>
                        <div v-else class="text-lg p-5 text-center">
                            No Emails Available !
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import {Head, router} from '@inertiajs/vue3';
import {ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    news_letter: Object
})

const errors = ref([]),
    disable = ref(false),
    news = ref({newsContent:'', email:''})

const deleteContact = (id) =>{
    if(!!id) {
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                disable.value = true
                axios
                    .delete('/send-news-email/' + id)
                    .then((response) => {
                        if (response.data.success){
                            Toast.fire({icon: "success", title: "Subscriber Deleted"})
                            router.visit('/news-letter')
                        }
                    }).finally(() => {
                    disable.value = false
                })
            }
        })
    }
}

const sendEmail = (email) =>{
    if (!news.value.newsContent)
        Toast.fire({icon: "error", title: "Email Content Required"})
    else if (!email)
        Toast.fire({icon: "error", title: "Something went wrong"})
    else {
        disable.value = true
        news.value.email = email
        axios
            .post('/send-news-email', news.value)
            .then((response) => {
                if(response.data.success)
                    Toast.fire({icon: "success", title: "Email Sent"})
            }).finally(()=>{
            disable.value = false
        }).catch((err) => {
            console.log(err.response)
            Toast.fire({icon: "error", title: err?.response?.data?.errors?.email[0]})
        })
    }
}

</script>
