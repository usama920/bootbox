<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'

const props = defineProps({
    contact: Object
})
</script>
<template>
    <Head title="Product Detail" />
    <div class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
        <UserLayout>
            <section class="relative table w-full py-20 bg-[url('../../assets/images/bg/bg1.jpg')] bg-bottom bg-no-repeat">
                <div class="absolute inset-0 bg-gradient-to-b from-violet-600 to-slate-900"></div>
                <div class="container">
                    <div class="grid grid-cols-1 pb-8 text-center mt-10">
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">Contact Us</h3>
                    </div>
                    <div class="text-center">
                        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                                <Link :href="route('welcome-home')">Home</Link>
                            </li>
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </section>
            <div class="relative">
                <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
                    <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <section class="relative pb-16">
                <div class="container">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">
                        <div class="text-center px-6 mt-6">
                            <div class="w-20 h-20 bg-violet-600/5 text-violet-600 rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                                <i class="uil uil-phone"></i>
                            </div>
                            <div class="content mt-7">
                                <h5 class="title text-xl font-semibold">Phone</h5>
                                <p class="text-slate-400 mt-3">{{contact?.phone_text}}</p>
                                <div class="mt-5">
                                    <a :href="contact?.phone" class="btn btn-link text-violet-600 hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">{{contact?.phone}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center px-6 mt-6">
                            <div class="w-20 h-20 bg-violet-600/5 text-violet-600 rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                                <i class="uil uil-envelope"></i>
                            </div>
                            <div class="content mt-7">
                                <h5 class="title text-xl font-semibold">Email</h5>
                                <p class="text-slate-400 mt-3">{{contact?.email_text}}</p>
                                <div class="mt-5">
                                    <a :href="'mailto:'+contact?.email" class="btn btn-link text-violet-600 hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">{{contact?.email}}</a>
                                </div>
                            </div>
                        </div>
<!--                        <div class="text-center px-6 mt-6">-->
<!--                            <div class="w-20 h-20 bg-violet-600/5 text-violet-600 rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">-->
<!--                                <i class="uil uil-map-marker"></i>-->
<!--                            </div>-->
<!--                            <div class="content mt-7">-->
<!--                                <h5 class="title text-xl font-semibold">Location</h5>-->
<!--                                <p class="text-slate-400 mt-3">C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485</p>-->
<!--                                <div class="mt-5">-->
<!--                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"-->
<!--                                       data-type="iframe" class="video-play-icon read-more lightbox btn btn-link text-violet-600 hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">View on Google map</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="container md:mt-24 mt-16">
                    <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                        <div class="lg:col-span-7 md:col-span-6 order-1 md:order-2">
                            <img src="/assets/images/contact.svg" alt="">
                        </div>
                        <div class="lg:col-span-5 md:col-span-6 mt-8 md:mt-0 order-2 md:order-1">
                            <div class="lg:mr-5">
                                <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                                    <h3 class="mb-6 text-2xl leading-snug font-medium">Get in touch !</h3>
                                    <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                        <p class="mb-0" id="error-msg"></p>
                                        <div id="simple-msg"></div>
                                        <div class="grid lg:grid-cols-12 lg:gap-6">
                                            <div class="lg:col-span-6 mb-5">
                                                <div class="text-left">
                                                    <label for="name" class="font-semibold">Your Name:</label>
                                                    <input name="name" id="name" type="text" class="form-input text-[15px] rounded-full mt-2" placeholder="Name :">
                                                </div>
                                            </div>

                                            <div class="lg:col-span-6 mb-5">
                                                <div class="text-left">
                                                    <label for="email" class="font-semibold">Your Email:</label>
                                                    <input name="email" id="email" type="email" class="form-input text-[15px] rounded-full mt-2" placeholder="Email :">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <div class="mb-5">
                                                <div class="text-left">
                                                    <label for="subject" class="font-semibold">Your Question:</label>
                                                    <input name="subject" id="subject" class="form-input text-[15px] rounded-full mt-2" placeholder="Subject :">
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <div class="text-left">
                                                    <label for="comments" class="font-semibold">Your Comment:</label>
                                                    <textarea name="comments" id="comments" class="form-input text-[15px] rounded-2xl h-28 mt-2" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit" name="send" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full justify-center flex items-center">Send Message</button>
                                    </form>
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
