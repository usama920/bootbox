<script setup>
import {Link} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

const footer = ref({})

const yearShow = () =>{
    return new Date().getFullYear()
}

const footerContent = () =>{
    axios
        .get('/footer-content')
        .then((response)=>{
            footer.value = response?.data?.data
        })
}

onMounted(()=>{
    footerContent()
})
</script>
<template>
    <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200 mt-24">
        <div class="container">
            <div class="grid grid-cols-1">
                <div class="relative py-16">
                    <div class="relative w-full">
                        <div class="relative -top-32 bg-white dark:bg-slate-900 lg:px-8 px-6 py-10 rounded-xl shadow dark:shadow-gray-800 overflow-hidden">
                            <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px]">
                                <div class="md:text-left text-center z-1">
                                    <h3 class="text-[26px] font-semibold text-slate-900 dark:text-white">Subscribe to Newsletter!</h3>
                                    <p class="text-slate-400 max-w-xl mx-auto">Subscribe to get latest updates and information.</p>
                                </div>
                                <div class="subcribe-form z-1">
                                    <form class="relative max-w-lg md:ml-auto">
                                        <input type="email" id="subcribe" name="email" class="pt-4 pr-40 pb-4 pl-6 w-full h-[50px] outline-none text-slate-900 dark:text-white rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-800" placeholder="Enter your email :">
                                        <button type="submit" class="btn absolute top-[2px] right-[3px] h-[46px] bg-gray-700 hover:bg-gray-900 border-white hover:border-white text-white rounded-full">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="absolute -top-5 -left-5">
                                <div class="uil uil-envelope lg:text-[150px] text-7xl text-slate-900/5 dark:text-white/5 -rotate-45"></div>
                            </div>
                            <div class="absolute -bottom-5 -right-5">
                                <div class="uil uil-pen lg:text-[150px] text-7xl text-slate-900/5 dark:text-white/5"></div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] -mt-24">
                            <div class="lg:col-span-4 md:col-span-12">
                                <a href="#" class="text-[22px] focus:outline-none">
                                    <img src="/assets/logo/logo.jpeg" alt="">
                                </a>
                            </div>
                            <div class="lg:col-span-2 md:col-span-4">
                            </div>
                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Boot Box</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li>
                                        <Link :href="route('about')" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="pr-1 fa-solid fa-angle-right"></i> About Us</Link>
                                    </li>
                                    <li class="mt-[10px]">
                                        <Link :href="route('terms')" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="pr-1 fa-solid fa-angle-right"></i> Terms & Condition</Link>
                                    </li>
                                    <li class="mt-[10px]">
                                        <Link :href="route('privacy')" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="pr-1 fa-solid fa-angle-right"></i> Privacy policy</Link>
                                    </li>
                                    <li class="mt-[10px]">
                                        <Link :href="route('contact')" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="pr-1 fa-solid fa-angle-right"></i> Contact Us</Link>
                                    </li>
                                </ul>
                            </div>
                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Contact Details</h5>
                                <div class="mt-6">
                                    <div class="flex mt-6">
                                        <i class="w-5 h-5 text-violet-600 mr-3 mt-1 fa-solid fa-envelope"></i>
                                        <div class="">
                                            <a :href="footer?.contact_email" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out">{{footer.contact_email}}</a>
                                        </div>
                                    </div>
                                    <div class="flex mt-6">
                                        <i class="w-5 h-5 text-violet-600 mr-3 mt-1 fa-solid fa-phone"></i>
                                        <div class="">
                                            <a :href="'tel:'+footer.contact_number" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out">{{footer.contact_number}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-[30px] px-0 border-t bg-black border-gray-800 dark:border-gray-700">
            <div class="container text-center">
                <div class="grid md:grid-cols-2 items-center gap-6">
                    <div class="md:text-left text-center">
                        <p class="mb-0 text-gray-300">©
                            {{ yearShow() }} Boot Box. Develop by <i class="mdi mdi-heart text-red-600"></i>
                            <a href="https://shreethemes.in/" target="_blank" class="text-reset"> Usama Aslam</a>.
                        </p>
                    </div>
                    <ul class="list-none md:text-right space-x-4 text-center">
                        <li class="inline">
                            <a :href="footer?.social_facebook" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600">
                                <i class="uil uil-facebook-f align-middle" title="facebook"></i>
                            </a>
                        </li>
                        <li class="inline">
                            <a :href="footer?.social_instagram" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600">
                                <i class="uil uil-instagram align-middle" title="instagram"></i>
                            </a>
                        </li>
                        <li class="inline">
                            <a :href="footer?.social_twitter" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600">
                                <i class="uil uil-twitter align-middle" title="twitter"></i>
                            </a>
                        </li>
                        <li class="inline">
                            <a :href="footer?.social_email" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600">
                                <i class="uil uil-envelope align-middle" title="email"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-violet-600 text-white leading-9"><i class="uil uil-arrow-up"></i></a>
</template>


