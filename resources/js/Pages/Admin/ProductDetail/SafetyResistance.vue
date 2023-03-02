<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Safety Resistance Types</div>
            <div data-te-toggle="modal" data-te-target="#addSafetyResistanceProduct" class="py-2 px-4 text-sm text-white cursor-pointer hover:bg-blue-600 bg-blue-500 rounded-lg">
                Add New Safety Resistance Type
            </div>
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
                                    Safety Resistance Type Name
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product,key) in safeties?.data" :key="product?.id" class="text-gray-700">
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ product?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center space-x-2 text-white mx-auto">
                                        <div @click="editSafetyResistance(product?.id)" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">Edit</div>
                                        <div @click="deleteSafetyResistance(product?.id)" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-if="safeties?.data?.length !== 0" class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="safeties?.links" />
                        </div>
                        <div v-else class="text-lg p-5 text-center">
                            No Safety Resistance Type Available !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-dialog ModalId="addSafetyResistanceProduct" @CloseModal="CloseModal">
            <form class="space-y-2 p-4 text-lg">
                <label>Name:</label>
                <span class="text-red-500 ml-2 text-xs font-bold" v-for="err in errors?.name">{{err}}</span>
                <input v-model="safety.name" type="text" class="w-full rounded" autocomplete="off" placeholder="Name">
            </form>
            <div class="flex justify-end p-4">
                <button @click="safetySave()" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
            </div>
        </modal-dialog>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import ModalDialog from '@/Components/ModalDialog.vue'
import {Head, router} from '@inertiajs/vue3';
import {ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    safeties: Object
})

const safety = ref({id:'', name:''}),
    errors = ref([]),
    disable = ref(false)

const CloseModal = () =>{
    safety.value = {id:'', name:''}
}

const editSafetyResistance = (id) =>{
    if(!!id){
        axios
            .get('/safety-resistance/'+id)
            .then((response)=>{
                if(response.data.success){
                    safety.value = response?.data?.data
                    $('#addSafetyResistanceProduct').modal('show');
                }
            })
    }
}

const deleteSafetyResistance = (id) =>{
    if (!!id){
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                axios
                    .delete('/safety-resistance/'+id)
                    .then((response) => {
                        if(response.data.success) {
                            Toast.fire({icon: "success", title: "Deleted Successfully!"})
                            router.visit('/safety-resistance')
                            CloseModal()
                        }
                    })
            }
        })
    }
}

const safetySave = () =>{
    disable.value = true
    axios
        .post('/safety-resistance', safety.value)
        .then((response)=>{
            if(response.data.success){
                $('#addSafetyResistanceProduct').modal('hide');
                router.visit('/safety-resistance')
                Toast.fire({icon: "success", title: "Safety Resistance Type Saved!"})
                CloseModal()
            }
        }).finally(()=>{
        disable.value = false
    })
}
</script>
