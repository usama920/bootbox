<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";

const products = ref({}),
    baseUrl = window.location.origin

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const displayCart = () =>{

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
                    <div class="overflow-x-auto">
                        <table v-if="true" class="min-w-full text-left text-sm font-light">
                            <thead>
                            <tr class="border-b !text-left text-white text-[16px] bg-transparent whitespace-nowrap text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                <th class="py-5">
                                    Products
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
                            <tr class="text-[16px] font-sans text-white">
                                <td class="">
                                    <p class="whitespace-no-wrap">1</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap">1</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap">
                                        <span class="text-blue-300 corsor-pointer hover:text-red-300">Remove</span>
                                    </p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap">$50</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap">3 months</p>
                                </td>
                                <td class="">
                                    <p class="whitespace-no-wrap">$10</p>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                        <div v-else class="text-lg p-5 text-center">
                            No Category Available !
                        </div>
                    </div>
                </div>
            </section>
        </UserLayout>
    </div>
</template>
