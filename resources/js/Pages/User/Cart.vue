<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions(),
    products = ref({}),
    price = ref({total: 0, sub_total:0}),
    baseUrl = window.location.origin,
    cart = ref([]),
    weekPlan = ref({})

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
            cart.value = response?.data?.data?.data1
            weekPlan.value.weeks = response?.data?.data?.data2*4
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
    weekPlan.value.firstWeek = price.value.total/weekPlan.value.weeks + 2.99
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

const checkout = (val) =>{

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
                            Shopping Cart
                        </h3>
                    </div>
                    <div class="text-center">
                        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                                <Link :href="route('welcome-home')">Home</Link>
                            </li>
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">
                                Cart
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="max-w-6xl mx-auto">
                    <div v-if="cart?.length>0">
                        <div class="overflow-x-auto">
                            <table class="min-w-full mx-5 xl:mx-0 text-left text-sm font-light">
                                <thead>
                                <tr class="border-b !text-left text-white text-[14px] bg-transparent whitespace-nowrap font-normal uppercase text-gray-500">
                                    <th>
                                        <div class="w-32 ml-2">Products</div>
                                    </th>
                                    <th>
                                        <div class="w-20">Size</div>
                                    </th>
                                    <th>
                                        <div class="w-20">Remove</div>
                                    </th>
                                    <th>
                                        <div class="w-24">Total Price</div>
                                    </th>
                                    <th>
                                        <div class="w-28">Subscription</div>
                                    </th>
                                    <th class="py-5">
                                        <div class="w-28">Monthly Payment</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="data in cart" class="text-[16px] font-sans text-white">
                                    <td class="py-2">
                                        <div class="flex items-center">
                                            <img :src="baseUrl+'/storage/images/products/'+data?.image" class="rounded-md w-20 h-20" alt="">
                                            <div :title="data?.product" class="whitespace-nowrap overflow-hidden px-2 truncate">{{ data?.product }}</div>
                                        </div>
                                    </td>
                                    <td class="">
                                        <p class="whitespace-no-wrap px-2">{{ data?.size }}</p>
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
                                <table class="min-w-full mx-5 text-left text-sm font-light">
                                    <thead>
                                    <tr class="border-b !text-left text-white text-[14px] bg-transparent whitespace-nowrap uppercase text-gray-500">
                                        <th class="py-5">
                                            <div class="w-32">Total Products</div>
                                        </th>
                                        <th class="py-5">
                                            <div class="w-32">Total Price</div>
                                        </th>
                                        <th class="py-5">
                                            <div class="w-60">Total First Subscription Price</div>
                                        </th>
                                        <th class="py-5">
                                            <div class="w-20">Action</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-[16px] font-sans text-white">
                                        <td class="py-2">
                                            <p class="whitespace-nowrap py-2">{{ cart?.length }}</p>
                                        </td>
                                        <td class="">
                                            <p class="whitespace-nowrap py-2">${{price.total}}</p>
                                        </td>
                                        <td class="">
                                            <p class="whitespace-nowrap py-2">${{ price.sub_total.toFixed(2) }} First Month</p>
                                        </td>
                                        <td class="">
                                            <button @click="checkout(1)" class="px-4 py-2 border border-white rounded-full bg-violet-600 hover:bg-violet-700 text-white">
                                                CHECKOUT
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="  mx-8 bg-violet-900 border-white border rounded p-2 items-center">
                            <input v-model="weekPlan.check" id="enableWeek" type="checkbox" class="w-4 h-4 rounded mr-2">
                            <label for="enableWeek">Do you want to take weekly subscription plan</label>
                            <div v-if="weekPlan.check" class=" text-left text-sm font-light">
                                <div class="!text-left p-5 text-white text-[16px] bg-transparent whitespace-nowrap text-gray-500">
                                    <div >Total Subscription Weeks:</div>
                                    <div class="py-5">{{ weekPlan.weeks }} weeks</div>
                                    <div>First Week Subscription Price:</div>
                                    <div class="py-5">$ {{ weekPlan.firstWeek.toFixed(2)}}</div>
                                    <button @click="checkout(2)" class="px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border border-white text-white">
                                        CHECKOUT
                                    </button>
                                </div>
                            </div>
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
