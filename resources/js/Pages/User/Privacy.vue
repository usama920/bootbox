<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";

const baseUrl = window.location.origin


const props = defineProps({

});

onMounted(()=>{

})
</script>
<template>
    <Head title="Product Detail" />
    <div class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
        <UserLayout>
            <section class="relative table w-full py-36 bg-[url('../../assets/images/bg/bg1.jpg')] bg-bottom bg-no-repeat">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900"></div>
                <div class="container">
                    <div class="grid grid-cols-1 pb-8 text-center mt-10">
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">Privacy Policy</h3>
                    </div>
                </div>
                <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
                    <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                            <Link :href="route('welcome-home')">Home</Link>
                        </li>
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">Privacy Policy</li>
                    </ul>
                </div>
            </section>
            <div class="relative">
                <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
                    <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <section class="relative md:py-24 py-16">
                <div class="container">
                    <div class="grid lg:grid-cols-12 grid-cols-2 items-center gap-[30px]">
                        <div class="lg:col-span-5">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-violet-600 rounded-lg -mt-[15px] -ml-[15px] h-[98%] w-[98%] -z-1"></div>
                                <img src="/assets/images/about.jpg" class="rounded-lg shadow-md dark:shadow-gray-800" alt="">
                                <div class="absolute bottom-2/4 translate-y-2/4 right-0 left-0 text-center">
                                    <a href="#" data-type="youtube" data-id="yba7hPeTSjk" class="lightbox h-20 w-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-violet-600">
                                        <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-7">
                            <div class="lg:ml-5">
                                <span class="text-violet-600 font-medium">Creative Vision & Mission</span>
                                <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">We develop & create <br> digital art.</h3>
                                <p class="text-slate-400 max-w-xl">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>
                                <p class="text-slate-400 max-w-xl mt-4">It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. This might also explain why one can now find slightly different versions.</p>
                                <div class="mt-6">
                                    <Link :href="route('contact')" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mr-2 mt-2"><i class="uil uil-envelope"></i> Contact us</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </UserLayout>
    </div>
</template>
<style scoped>

</style>
