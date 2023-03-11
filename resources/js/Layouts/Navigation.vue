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

        <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: true }">
            <nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                <template #icon>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                </template>
                Dashboard
            </nav-link>
            <nav-link :href="route('users.index')" :active="route().current('users.index')">
                <template #icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </template>
                Users
            </nav-link>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="contentDrop = !contentDrop">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
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
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
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
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
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
                    </ul>
                </div>
            </transition>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="messageDrop = !messageDrop">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="mx-3">Messages</span>
                <i class="fa-solid fa-sort-down -mt-1.5"></i>
            </a>
            <transition
                enter-to-class="transition-all duration-300 ease-in-out"
                enter-from-class="max-h-0 opacity-25"
                leave-from-class="opacity-100 max-h-xl"
                leave-to-class="max-h-0 opacity-0">
                <div v-show="messageDrop">
                    <ul class="overflow-hidden p-2 mx-4 mt-2 space-y-2 text-sm font-medium text-white bg-gray-700 bg-opacity-50 rounded-md shadow-inner"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-white"></i>
                            <Link class="w-full" :href="route('products.index')">Unread Messages</Link>
                        </li>
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
                            <i class="fas fa-circle text-green-500"></i>
                            <Link class="w-full" :href="route('products.index')">Delivered</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-yellow-500"></i>
                            <Link class="w-full" :href="route('products.index')">In Process</Link>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-red-500"></i>
                            <Link class="w-full" :href="route('products.index')">Cancelled</Link>
                        </li>
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
