<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="text-[25px] my-2">Orders</div>
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
                                    Order Status
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Subscription Status
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Subscription Type
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Subscription Installment
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Product Name
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Product Size
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Customer name
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Phone
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Address 1
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Address 2
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    City
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    State
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Zipcode
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Country
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product,key) in orders?.data" :key="product?.id" class="text-gray-700">

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">
                                        <span class="text-green-600 font-extrabold" v-if="!!product?.status && product?.status === '1'">Delivered</span>
                                        <span class="text-orange-600 font-extrabold" v-else-if="!!product?.status && product?.status === '2'">Pending</span>
                                        <span class="text-yellow-600 font-extrabold" v-else-if="!!product?.status && product?.status === '3'">On Its Way</span>
                                    </p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.subscription_status }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.order_subscription?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ productSubType(product?.subscription_type) }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.order_product.product_name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.order_sizes?.size_name?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.phone}}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.address_1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.address_2 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.city }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.state }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.zipcode }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.country }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                        <div class="flex items-center space-x-2 text-white mx-auto">
                                            <div @click="showFurtherDetail(product?.id)" class="py-1 rounded px-3 whitespace-nowrap bg-green-500 hover:bg-green-600 cursor-pointer">Further Detail</div>
                                            <span class="flex space-x-2" v-if="product?.status !== '1'">
                                                <div v-if="product?.status === '2'" @click="updateProcessStatus(product?.id)" class="py-1 rounded px-3 whitespace-nowrap bg-yellow-500 hover:bg-yellow-600 cursor-pointer">
                                                    On Its Way
                                                </div>
                                                <div @click="updateStatus(product?.id)" class="py-1 rounded px-3 whitespace-nowrap bg-green-500 hover:bg-green-600 cursor-pointer">
                                                    Delivered
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="orders?.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-dialog maxWidth="!w-[700px] !max-w-[700px]" ModalId="orderDetail" @CloseModal="CloseModal">
            <div class="mx-auto text-gray-900">
                <div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead>
                            <tr class="border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    #No
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Paid Amount
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    From
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    To
                                </th>
                                <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    Invoice
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="!!furtherDetail?.order_installments && furtherDetail?.order_installments?.length > 0" v-for="(data, key) in furtherDetail?.order_installments" class="text-gray-700">
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key + 1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ data.paid_amount }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ data.start_at }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ data.end_at }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <a v-if="!!data?.invoice_url" :href="data?.invoice_url" target="_blank" class="text-blue-600 hover:text-blue-800 font-extrabold whitespace-nowrap">INVOICE</a>
                                </td>
                            </tr>
                            <tr v-else class="text-center mx-auto">
                                <td colspan="5" class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">Installments data not available</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </modal-dialog>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";
import ModalDialog from '@/Components/ModalDialog.vue';

const { Toast, ConfirmToast } = commonFunctions(),
    furtherDetail = ref({})

const props = defineProps({
    orders: Object
})

const errors = ref([]),
    disable = ref(false)

const productSubType = (val) =>{
    if (val === 0)
        return 'monthly'
    else
        return 'weekly'
}

const showFurtherDetail = (id) =>{
    let test = props.orders.data.filter(x=>x.id===id)
    furtherDetail.value =test[0]
    $('#orderDetail').modal('show')
}

const CloseModal = () => {

}

const updateStatus = (id) => {
    console.log(id)
    axios
        .post('/product-status', { id: id })
        .then((response) => {
            if (response.data.success) {
                Toast.fire({ icon: "success", title: "Status Changed to Delivered!" })
                router.visit('/admin-order')
            }
        })
}

const updateProcessStatus = (id) => {
    console.log(id)
    axios
        .post('/product-status-process', { id: id })
        .then((response) => {
            if (response.data.success) {
                Toast.fire({ icon: "success", title: "Status Changed to On Its Way!" })
                router.visit('/admin-order')
            }
        })
}

onMounted(()=>{
    console.log(props.orders)
})
</script>
