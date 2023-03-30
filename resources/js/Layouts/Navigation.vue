<template>
    <div :class="$page.props.showingMobileMenu ? 'block' : 'hidden'" @click="$page.props.showingMobileMenu = false"
         class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>
    <div :class="$page.props.showingMobileMenu ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
         class="overflow-y-auto fixed lg:!static inset-y-0 left-0 z-30 w-64 bg-black transition duration-300 transform lg:!translate-x-0 lg:inset-0">
        <div class="flex justify-center items-center mt-8">
            <div class="flex items-end">
                <Link :href="route('welcome-home')">
                    <img class="h-16" alt="logo" src="/assets/logo/logo.jpeg">
                </Link>
                <span class="mx-2 text-2xl font-semibold text-white">Boot Box</span>
            </div>
        </div>

        <nav class="my-10" x-data="{ isMultiLevelMenuOpen: true }">
            <nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                <template #icon>
                    <i class="fa-solid fa-user"></i>
                </template>
                Admin Dashboard
            </nav-link>
            <nav-link :href="route('users.index')" :active="route().current('users.index')">
                <template #icon>
                    <i class="fa-solid fa-users"></i>
                </template>
                Users
            </nav-link>
            <nav-link :href="route('news-letter.index')" :active="route().current('news-letter.index')">
                <template #icon>
                    <i class="fa-solid fa-envelope "></i>
                </template>
                Newsletter
            </nav-link>
            <nav-link :href="route('view-contact.index')" :active="route().current('view-contact.index')">
                <template #icon>
                    <i class="fa-solid fa-address-book"></i>
                </template>
                User Contact
            </nav-link>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="contentDrop = !contentDrop">
                <i class="fa-solid fa-folder"></i>
                <span class="mx-3">Pages Content</span>
                <i class="fa-solid fa-sort-down -mt-1.5"></i>
            </a>
            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0">
                <div v-show="contentDrop">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 flex items-center space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('social-links')">Social Links</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('about-content')">About Us</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('contact-content')">Contact Us</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('terms-content')">Terms Policy</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('privacy-content')">Privacy Policy</Link>
                        </li>
                    </ul>
                </div>
            </transition>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="optionDrop = !optionDrop">
                <i class="fa-solid fa-circle-info"></i>
                <span class="mx-3">Product Detail</span>
                <i class="fa-solid fa-sort-down -mt-1.5"></i>
            </a>
            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0">
                <div v-show="optionDrop">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 flex items-center space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('weekly-margin.index')">Weekly Product Margin</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 flex items-center space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('category.index')">Categories</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('sub_category.index')">SubCategories</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('style.index')">Style</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('size.index')">Sizes</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('material.index')">Material</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('tier_level.index')">Tier Level</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('safety_resistance.index')">Safety Resistance Type</Link>
                        </li>
                    </ul>
                </div>
            </transition>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="productDrop = !productDrop">
                <i class="fa-brands fa-product-hunt"></i>
                <span class="mx-3">Products</span>
                <i class="fa-solid fa-sort-down -mt-1.5"></i>
            </a>
            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0">
                <div v-show="productDrop">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 flex items-center space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <div class="cursor-pointer" @click="addProduct()">Add New Product</div>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('products.index')">All Products</Link>
                        </li>
<!--                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">-->
<!--                            <i class="fas fa-circle text-gray-100"></i>-->
<!--                            <Link class="w-full" :href="route('view-coupon.index')">Coupons</Link>-->
<!--                        </li>-->
                    </ul>
                </div>
            </transition>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="orderDrop = !orderDrop">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="mx-3">Orders</span>
                <i class="fa-solid fa-sort-down -mt-1.5"></i>
            </a>
            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0">
                <div v-show="orderDrop">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-white"></i>
                            <Link class="w-full" :href="route('order.index')">All Orders</Link>
                        </li>
<!--                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">-->
<!--                            <i class="fas fa-circle text-green-500"></i>-->
<!--                            <Link class="w-full" :href="route('order.index')">Delivered</Link>-->
<!--                        </li>-->
<!--                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">-->
<!--                            <i class="fas fa-circle text-yellow-500"></i>-->
<!--                            <Link class="w-full" :href="route('products.index')">In Process</Link>-->
<!--                        </li>-->
<!--                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">-->
<!--                            <i class="fas fa-circle text-red-500"></i>-->
<!--                            <Link class="w-full" :href="route('products.index')">Cancelled</Link>-->
<!--                        </li>-->
                    </ul>
                </div>
            </transition>
        </nav>
    </div>

</template>

<script setup>
import NavLink from '@/Components/NavLink.vue';
import {Link, router} from '@inertiajs/vue3';
import { ref } from 'vue'

const orderDrop = ref(false),
    productDrop = ref(false),
    optionDrop = ref(false),
    contentDrop = ref(false),
    messageDrop = ref(false)


const addProduct = () =>{
    router.visit('/products/edit/'+'')

}
</script>

<style scoped>

</style>
