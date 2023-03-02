<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            Users
        </template>
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
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
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user,key) in users.data" :key="user.id" class="text-gray-700">
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ user.name }}</p>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ user.email }}</p>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <div class="flex items-center space-x-2 text-white mx-auto">
                                <div @click="deleteTier(user?.id)" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="users.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import {Head, router} from '@inertiajs/vue3';
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    users: Object
})

const deleteTier = (id) =>{
    if (!!id){
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                axios
                    .delete('/users/'+id)
                    .then((response) => {
                        if(response.data.success) {
                            Toast.fire({icon: "success", title: "Deleted Successfully!"})
                            router.visit('/users')
                        }
                    })
            }
        })
    }
}

</script>
