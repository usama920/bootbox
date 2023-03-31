<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";
import ModalDialog from '@/Components/ModalDialogDark.vue';

const { Toast, ConfirmToast } = commonFunctions(),
    products = ref({}),
    price = ref({total: 0, sub_total:0}),
    baseUrl = window.location.origin,
    cart = ref([]),
    furtherDetail = ref({})

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const displayCart = () =>{
    axios
        .get('/orders')
        .then((response)=>{
            cart.value = response?.data?.data
        })
}

const typeName = (val, price) =>{
    if(val === 1){

        return 'weekly'
    }
    else return 'monthly'
}

const showDetail = (id) => {
    let test = cart.value.filter(x => x.id === id)
    furtherDetail.value = test[0]
    $('#orderDetail').modal('show')
}

const CloseModal = () => {

}
onMounted(()=>{
    displayCart()
})
</script>

<template>
    <Head title="Home" />
    <div class="font-urbanist text-base text-white bg-slate-900">
        <span class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/40 to-violet-600/40"></span>
        <UserLayout>
            <section class="relative">
                <div class="container py-20">
                    <div class="grid grid-cols-1 pb-8 text-center mt-10">
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">
                            All Orders
                        </h3>
                    </div>
                    <div class="text-center">
                        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                                <Link :href="route('welcome-home')">Home</Link>
                            </li>
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">
                                Orders
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="max-w-6xl mx-auto">
                    <div v-if="cart?.length>0">
                        <div class="overflow-x-auto sm:overflow-hidden">
                            <table class="min-w-full mx-5 xl:mx-0 text-left text-sm font-light">
                                <thead>
                                <tr class="border-b !text-left text-white text-[14px] bg-transparent whitespace-nowrap font-normal uppercase text-gray-500">
                                    <th>
                                        <div class="w-32 ml-2">Products</div>
                                    </th>
                                    <th>
                                        <div class="w-16">Size</div>
                                    </th>
                                    <th>
                                        <div class="w-36">Subscription Status</div>
                                    </th>
                                    <th>
                                        <div class="w-36">Subscription Span</div>
                                    </th>
                                    <!-- <th>
                                        <div class="w-32">Total Price</div>
                                    </th> -->
                                    <th>
                                        <div class="w-40">Subscription Type</div>
                                    </th>
                                    <!-- <th class="py-5">
                                        <div class="w-44">Installment Amount</div>
                                    </th> -->
                                    <th class="py-5">
                                        <div class="w-28">Action</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="data in cart" class="text-[16px] font-sans text-white">
                                    <td class="py-2">
                                        <div class="flex items-center">
                                            <div class="whitespace-nowrap overflow-hidden px-2 truncate">{{ data?.order_product?.product_name }}</div>
                                        </div>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap px-2">{{ data?.order_sizes?.size_name?.name }}</p>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">
                                            {{ data?.subscription_status }}
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">
                                            {{ data?.order_subscription?.name }}
                                        </p>
                                    </td>
                                    <!-- <td class="">
                                        <p class="whitespace-no-wrap py-2">${{ data?.total_amount }}</p>
                                    </td> -->
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">{{ typeName(data?.subscription_type, data?.total_amount) }}</p>
                                    </td>
                                    <!-- <td class="">
                                        <p class="whitespace-no-wrap py-2">${{ data?.installment_price }}</p>
                                    </td> -->
                                    <td class="">
                                        <div class="whitespace-no-wrap py-2 flex items-center space-x-2 text-white mx-auto">
                                            <button @click="showDetail(data?.id)" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">Detail</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div v-else class="text-lg p-5 text-center">
                        No Orders added by you !
                    </div>
                </div>
            </section>
            <modal-dialog maxWidth="!w-[700px] !max-w-[700px]" ModalId="orderDetail" @CloseModal="CloseModal">
                <div class="mx-auto text-gray-900">
                    <div>
                        <table class="min-w-full !text-white text-left text-sm !font-bold">
                            <thead>
                                <tr class="border-b whitespace-nowrap bg-transparent text-left text-xs font-semibold uppercase tracking-wide">
                                    <th class="border-b-2 border-gray-200 bg-transparent px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        #No
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-transparent px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        Paid Amount
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-transparent px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        From
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-transparent px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        To
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-transparent px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider">
                                        Invoice
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!!furtherDetail?.order_installments && furtherDetail?.order_installments?.length > 0" v-for="(data, key) in furtherDetail?.order_installments" class="text-gray-700">
                                    <td class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <p class="text-white whitespace-no-wrap">{{ key + 1 }}</p>
                                    </td>
                                    <td class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <p class="text-white whitespace-nowrap">{{ data.paid_amount }}</p>
                                    </td>
                                    <td class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <p class="text-white whitespace-nowrap">{{ data.start_at }}</p>
                                    </td>
                                    <td class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <p class="text-white whitespace-nowrap">{{ data.end_at }}</p>
                                    </td>
                                    <td class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <a v-if="!!data?.invoice_url" :href="data?.invoice_url" target="_blank" class="bg-white px-3 py-1 rounded hover:underline text-blue-600 hover:text-blue-800 font-extrabold whitespace-nowrap">INVOICE</a>
                                    </td>
                                </tr>
                                <tr v-else class="text-center mx-auto">
                                    <td colspan="5" class="border-b border-gray-200 bg-transparent px-5 py-5 text-sm">
                                        <p class="text-white whitespace-no-wrap">Installments data not available</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </modal-dialog>
        </UserLayout>
    </div>
</template>
