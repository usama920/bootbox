<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Newsletter Email Content</div>
        </div>
<!--        <textarea v-model="news.newsContent" rows="5" type="text" class="w-full rounded" autocomplete="off" placeholder="............."></textarea>-->
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
                                    Name
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Email
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Status
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(news,key) in user_contact?.data" :key="news?.id" class="text-gray-700">
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ news?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ news?.email }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <span class="text-red-600 font-bold" v-if="news?.status === '1'">Unread</span>
                                        <span class="text-yellow-600 font-bold" v-else-if="news?.status === '2'">Read</span>
                                        <span class="text-green-600 font-bold" v-else-if="news?.status === '3'">Replied</span>
                                    </p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center space-x-2 text-white mx-auto">
                                        <button @click="viewContact(news?.id)" :class="{'opacity-50':disable}" :disabled="disable" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">View & Reply</button>
                                        <button @click="deleteContact(news?.id)" :class="{'opacity-50':disable}" :disabled="disable" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-if="user_contact?.data?.length !== 0" class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="user_contact?.links" />
                        </div>
                        <div v-else class="text-lg p-5 text-center">
                            No Emails Available !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-dialog ModalId="viewContact" @CloseModal="CloseModal">
            <div class="space-y-2 px-4 text-lg">
                <label class="text-base text-black font-bold">Name:</label>
                <div class="p-2 text-base bg-gray-200 text-black font-bold rounded border border-black">{{contact?.name}}</div>
                <label class="text-base">Email:</label>
                <div class="p-2 text-base bg-gray-200 text-black font-bold rounded border border-black">{{contact?.email}}</div>
                <label class="text-base">Question:</label>
                <div class="p-2 text-base bg-gray-200 text-black font-bold rounded border border-black">{{contact?.question}}</div>
                <label class="text-base">Comment:</label>
                <div class="p-2 text-base bg-gray-200 text-black font-bold rounded border border-black">{{contact?.comment}}</div>
                <label class="text-base">Reply:</label><br>
                <input v-model="contact.reply" placeholder="Question Reply" class="w-full p-2 text-base text-black font-bold rounded border border-black" />
            </div>
            <div class="flex justify-end p-4">
                <button @click="replyContact(contact)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Send</button>
            </div>
        </modal-dialog>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import {Head, router} from '@inertiajs/vue3';
import {ref} from "vue";
import ModalDialog from '@/Components/ModalDialog.vue'
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    user_contact: Object
})

const errors = ref([]),
    disable = ref(false),
    contact = ref({name:'', id:'', question:'', comment:'', status:'', reply:''})

const CloseModal = () =>{
    router.visit('/all-contacts')
}

const deleteContact = (id) =>{
    if(!!id) {
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                disable.value = true
                axios
                    .delete('/user-contact/' + id)
                    .then((response) => {
                        if (response.data.success){
                            Toast.fire({icon: "success", title: "User Contact Deleted"})
                            router.visit('/all-contacts')
                        }
                    }).finally(() => {
                    disable.value = false
                })
            }
        })
    }
}

const replyContact = (post) =>{
     if (!post.reply)
        Toast.fire({icon: "error", title: "Reply Required"})
    else {
        disable.value = true
        axios
            .post('/user-contact-reply', contact.value)
            .then((response) => {
                if(response.data.success){
                    Toast.fire({icon: "success", title: "Email Sent"})
                    $('#viewContact').modal('hide')
                    router.visit('/all-contacts')
                }
            }).finally(()=>{
            disable.value = false
        }).catch((err) => {
            Toast.fire({icon: "error", title: 'something went wrong'})
        })
    }
}

const viewContact = (id) =>{
    axios
        .get('/change-status/'+id)
        .then((response)=>{
            if (response.data.success){
                let data = props.user_contact.data.filter(x=>x.id === id)
                contact.value = data[0]
                contact.value.reply = ''
                $('#viewContact').modal('show')
            }
        })
}
</script>
