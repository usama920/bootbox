<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Coupons</div>
            <div data-te-toggle="modal" data-te-target="#addCategoryProduct" class="py-2 px-4 text-sm text-white cursor-pointer hover:bg-blue-600 bg-blue-500 rounded-lg">
                Add New Coupon
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
                                        Coupon Code
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Status
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Type
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Amount
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Limit
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(coupon,key) in coupons?.data" :key="coupon?.id" class="text-gray-700">
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ coupon?.code }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ statusProduct(coupon?.status) }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ typeName(coupon?.type) }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ coupon?.amount }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ coupon?.limit }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center space-x-2 text-white mx-auto">
                                        <div @click="editCoupon(coupon?.id)" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">Edit</div>
                                        <div @click="deleteCoupon(coupon?.id)" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="coupons?.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-dialog ModalId="addCategoryProduct" @CloseModal="coupon_info={id:'',code:'',amount:'',status:'', type:'',limit:''}">
            <form class="space-y-2 p-4 text-base">
                <div class="my-2">
                    <label>Coupon Code:</label>
                    <input v-model="coupon_info.code" type="text" class="w-full rounded" autocomplete="off" placeholder="Name">
                </div>
                <div class="my-2">
                    <label>Amount/Percentage:</label>
                    <input v-model="coupon_info.amount" type="number" class="w-full rounded" autocomplete="off" placeholder="amount or percentage">
                </div>
                <div class="my-2">
                    <label>User Limit:</label>
                    <input v-model="coupon_info.limit" type="number" class="w-full rounded" autocomplete="off" placeholder="User Limit">
                </div>
                <div class="my-2">
                    <label>Deduction Type:</label>
                    <div class="text-[14px] w-full border-gray-500 bg-white p-1.5 border rounded flex items-center space-x-4">
                        <div class="flex items-center space-x-1">
                            <input :checked="coupon_info.type !== 1" @change="couponType(0)" type="radio" id="coupon_info_type_one" name="coupon_info_status" class="" >
                            <label for="coupon_info_type_one">Amount($)</label>
                        </div>
                        <div class="flex items-center space-x-1">
                            <input :checked="coupon_info.type === 1" @change="couponType(1)" type="radio" id="coupon_info_type_two" name="coupon_info_status" class="" >
                            <label for="coupon_info_type_two">Percentage(%)</label>
                        </div>
                    </div>
                </div>
                <div class="my-2">
                    <label>Coupon Status:</label>
                    <div class="text-[14px] w-full border-gray-500 bg-white p-1.5 border rounded flex items-center space-x-4">
                        <div class="flex items-center space-x-1">
                            <input :checked="coupon_info.status !== 1" @change="couponStatus(0)" type="radio" id="coupon_info_status_one" name="couponss_info" class="" >
                            <label for="coupon_info_status_one">Enable</label>
                        </div>
                        <div class="flex items-center space-x-1">
                            <input :checked="coupon_info.status === 1" @change="couponStatus(1)" type="radio" id="coupon_info_status_two" name="couponss_info" class="" >
                            <label for="coupon_info_status_two">Disable</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="flex justify-end p-4">
                <button @click="saveCoupon(coupon_info)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
            </div>
        </modal-dialog>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import ModalDialog from '@/Components/ModalDialog.vue'
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    coupons: Object
})

const errors = ref([]),
    disable = ref(false),
    coupon_info = ref({id:'',code:'',amount:'',status:0, type:0,limit:''})

const couponType = (type) =>{
    coupon_info.value.type = !!type ? type:0
}

const couponStatus = (status) =>{
    coupon_info.value.status = !!status ? status:0
}

const statusProduct = (status) =>{
    if(!!status && status === 1)
        return 'disabled'
    else
        return 'enabled'
}

const typeName = (type) =>{
    if(!!type && type === 1)
        return 'Percentage(%)'
    else
        return 'Amount($)'
}

const editCoupon = (id) =>{
    let data = props.coupons.data.filter(x=>x.id===id)
    coupon_info.value = data[0]
    $('#addCategoryProduct').modal('show')
}

const saveCoupon = (post) =>{
    if (!post.code || !post.amount || !post.limit)
        Toast.fire({icon: "error", title: "Fill all Fields!"})
    else
        axios
            .post('/coupons', coupon_info.value)
            .then((response) => {
                if(response.data.success) {
                    Toast.fire({icon: "success", title: "Saved!"})
                    $('#addCategoryProduct').modal('hide')
                    router.visit('/coupons')
                }
            })
}

const deleteCoupon = (id) =>{
    if (!!id){
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                axios
                    .delete('/coupons/'+id)
                    .then((response) => {
                        if(response.data.success) {
                            Toast.fire({icon: "success", title: "Coupon Deleted!"})
                            router.visit('/coupons')
                        }
                    })
            }
        })
    }
}

onMounted(()=>{
    console.log(props.coupons.data)
})
</script>
