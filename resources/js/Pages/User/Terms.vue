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
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">Terms Policy</h3>
                    </div>
                </div>
                <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
                    <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                            <Link :href="route('welcome-home')">Home</Link>
                        </li>
                        <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">Terms</li>
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
                    <div class="md:flex justify-center">
                        <div class="md:w-3/4">
                            <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                <h5 class="text-xl font-semibold mb-4">Introduction :</h5>
                                <p class="text-slate-400">It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>

                                <h5 class="text-xl font-semibold mb-4 mt-8">User Agreements :</h5>
                                <p class="text-slate-400">The most well-known dummy text is the 'Lorem Ipsum', which is said to have <b class="text-red-600">originated</b> in the 16th century. Lorem Ipsum is <b class="text-red-600">composed</b> in a pseudo-Latin language which more or less <b class="text-red-600">corresponds</b> to 'proper' Latin. It contains a series of real Latin words. This ancient dummy text is also <b class="text-red-600">incomprehensible</b>, but it imitates the rhythm of most European languages in Latin script. The <b class="text-red-600">advantage</b> of its Latin origin and the relative <b class="text-red-600">meaninglessness</b> of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's <b class="text-red-600">attention</b> from the layout.</p>
                                <p class="text-slate-400 mt-3">There is now an <b class="text-red-600">abundance</b> of readable dummy texts. These are usually used when a text is <b class="text-red-600">required purely</b> to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or <b class="text-red-600">nonsensical</b> stories.</p>
                                <p class="text-slate-400 mt-3">It seems that only <b class="text-red-600">fragments</b> of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>

                                <h5 class="text-xl font-semibold mb-4 mt-8">Restrictions :</h5>
                                <p class="text-slate-400">You are specifically restricted from all of the following :</p>
                                <ul class="list-none text-slate-400 mt-3">
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Create your own skin to match your brand</li>
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                                    <li class="flex mt-2"><i class="uil uil-arrow-right text-violet-600 text-lg align-middle mr-2"></i>Create your own skin to match your brand</li>
                                </ul>
                                <div class="mt-6">
                                    <a href="" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full">Accept</a>
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
