<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions(),
    products = ref({}),
    price = ref({total: 0, sub_total:0}),
    baseUrl = window.location.origin,
    cart = ref([])

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const displayCart = () =>{
    axios
        .get('/cart-items')
        .then((response)=>{
           cart.value = response?.data?.data
            if (cart.value.length>0)
                totalPrice(cart.value)
        })
}
function totalPrice(cart) {
    price.value.total = cart.reduce((total, item) => {
        return total + parseInt(item?.price);
    }, 0);
    price.value.sub_total = cart.reduce((total, item) => {
        return total + parseFloat(item?.sub_price);
    }, 0);
}

const removeCart = (id) =>{
    if (!!id){
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                axios
                    .delete('/cart/'+id)
                    .then((response) => {
                        if(response.data.success) {
                            Toast.fire({icon: "success", title: "Product removed from Cart!"})
                            displayCart()
                        }
                    })
            }
        })
    }
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
            <section class="relative table w-full py-36 bg-[url('../../assets/images/bg/bg1.jpg')] bg-bottom bg-no-repeat">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900"></div>
                <div class="container">
                    <div class="grid grid-cols-1 pb-8 text-center mt-10">
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">
                            Shopping Cart
                        </h3>
                    </div>
                </div>
                <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
                    <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                            <Link :href="route('welcome-home')">Home</Link>
                        </li>
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">
                            Cart
                        </li>
                    </ul>
                </div>
            </section>
            <section class="relative">
                <div class="container">
                    <div v-if="cart?.length>0" class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead>
                            <tr class="border-b !text-left text-white text-[16px] bg-transparent whitespace-nowrap text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                <th class="py-5">
                                    Products
                                </th>
                                <th class="py-5">
                                    Size
                                </th>
                                <th class="py-5">
                                    Quantity
                                </th>
                                <th class="py-5">
                                    Remove
                                </th>
                                <th class="py-5">
                                    Total Price
                                </th>
                                <th class="py-5">
                                    Subscription
                                </th>
                                <th class="py-5">
                                    Monthly Payment
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="data in cart" class="text-[16px] font-sans text-white">
                                <td class="py-2">
                                    <div class="flex items-center">
                                        <img :src="baseUrl+'/storage/images/products/'+data?.image" class="rounded-md w-20 h-20" alt="">
                                        <p class="whitespace-no-wrap pl-2">{{ data?.product }}</p>
                                    </div>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">{{ data?.size }}</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">{{ data?.quantity }}</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">
                                        <span @click="removeCart(data?.cart_identity)" class="text-blue-600 cursor-pointer hover:text-red-600">Remove</span>
                                    </p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">${{ data?.price }}</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">${{ data?.sub_type }}</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap py-2">{{ data?.sub_price }}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-lg p-5 text-center">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead>
                                <tr class="border-b !text-left text-white text-[16px] bg-transparent whitespace-nowrap text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                    <th class="py-5">
                                        Total Products
                                    </th>
                                    <th class="py-5">
                                        Total Price
                                    </th>
                                    <th class="py-5">
                                        Total First Subscription Price
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-[16px] font-sans text-white">
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">{{ cart?.length }}</p>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">${{price.total}}</p>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap py-2">${{ price.sub_total }} First Month</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div v-else class="text-lg p-5 text-center">
                        No Product added to Cart !
                    </div>
                </div>
            </section>
        </UserLayout>
    </div>
</template>
