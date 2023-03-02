<template>
    <div :class="$page.props.showingMobileMenu ? 'block' : 'hidden'" @click="$page.props.showingMobileMenu = false"
         class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

    <div :class="$page.props.showingMobileMenu ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
         class="overflow-y-auto fixed inset-y-0 left-0 z-30 w-64 bg-gray-900 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex justify-center items-center mt-8">
            <div class="flex items-center">
                <svg class="w-12 h-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                        fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/>
                    <path
                        d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                        fill="white"/>
                </svg>

                <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
            </div>
        </div>

        <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: true }">
            <nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                <template #icon>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
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
            <a class="flex items-center mt-4 py-2 px-6 text-gray-100" href="#" @click="optionDrop = !optionDrop">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
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
                            <i class="fas fa-plus text-gray-100"></i>
                            <div class="cursor-pointer" @click="addProduct()">Add New Product</div>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 space-x-2">
                            <i class="fas fa-circle text-gray-100"></i>
                            <Link class="w-full" :href="route('products.index')">All Products</Link>
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
    optionDrop = ref(false)

const addProduct = () =>{
    router.visit('/products/edit/'+'')

}
</script>

<style scoped>

</style>
