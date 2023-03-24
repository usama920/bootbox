<script setup>
import {Link} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const dropShow = ref(0),
    showMenu = ref(false)

const dropdownItems = (val) =>{
    if (dropShow.value === val)
        dropShow.value = 0
    else dropShow.value = val
}

const menuShow = () =>{
    showMenu.value = showMenu.value!==true
}

onMounted(()=>{

})

</script>
<template>
    <nav id="topnav" class="py-2">
        <div class="container md:flex justify-between">
            <div class="flex md:block justify-between items-center w-full md:!w-auto">
                <Link @click="dropdownItems(0)" :href="route('welcome-home')">
                    <img src="/assets/logo/logo.jpeg" class="h-20"  alt="">
                </Link>
                <i @click="menuShow()" class="md:hidden cursor-pointer fa-solid fa-bars"></i>
            </div>
            <ul :class="{'!block':showMenu}" class="hidden navigation-menu md:flex justify-center md:space-x-4 md:border-t-0 border-t-2 border-white">
                <li class="!float-none md:!float-left">
                    <Link @click="dropdownItems(0)" :href="route('welcome-home')" class="!inline-block">Home</Link>
                </li>
                <li class="relative !float-none md:!float-left">
                    <a @click="dropdownItems(1)" href="javascript:void(0)" class="cursor-pointer">
                        <span>Products</span>
                        <i :class="{'rotate-180 transition-all duration-500': dropShow===1}" class="transition-all duration-500 fa-solid ml-1 text-[14px] fa-caret-down"></i>
                    </a>
                    <ul v-if="dropShow === 1" class="bg-violet-600 transition-all duration-500 text-[14px] font-semibold text-center font-normal rounded-lg md:absolute z-50">
                        <li>
                            <Link :href="route('show_products_all')" class="!block py-1 rounded-t-lg px-8 hover:bg-violet-700">All</Link>
                        </li>
                        <li>
                            <Link :href="route('show_products_men')" class="!block py-1 px-8 hover:bg-violet-700">Men</Link>
                        </li>
                        <li>
                            <Link :href="route('show_products_women')" class="!block py-1 rounded-b-lg px-8 hover:bg-violet-700">Women</Link>
                        </li>
                    </ul>
                </li>
                <li class="!float-none md:!float-left">
                    <Link @click="dropdownItems(0)" :href="route('cart')">Orders</Link>
                </li>
                <li class="relative !float-none md:!float-left">
                    <a @click="dropdownItems(2)" href="javascript:void(0)" class="cursor-pointer">
                        <span>About</span>
                        <i :class="{'rotate-180 transition-all duration-500': dropShow===2}" class="transition-all duration-500 fa-solid ml-1 text-[14px] fa-caret-down"></i>
                    </a>
                    <ul v-if="dropShow === 2" class="bg-violet-600 text-[14px] font-semibold text-center font-normal rounded-lg md:absolute z-50">
                        <li>
                            <Link :href="route('about')" class="!block py-1 whitespace-nowrap rounded-t-lg px-8 hover:bg-violet-700">About Us</Link>
                        </li>
                        <li>
                            <Link :href="route('contact')" class="!block py-1 whitespace-nowrap px-8 hover:bg-violet-700">Contact Us</Link>
                        </li>
                        <li>
                            <Link :href="route('terms')" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Terms Policy</Link>
                        </li>
                        <li>
                            <Link :href="route('privacy')" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Privacy Policy</Link>
                        </li>
                    </ul>
                </li>
                <li class="relative !float-none md:!float-left">
                    <a @click="dropdownItems(3)" href="javascript:void(0)" class="cursor-pointer">
                        <i class="fas fa-user text-[14px]"></i>
                        <i :class="{'rotate-180 transition-all duration-500': dropShow===3}" class="transition-all duration-500 fa-solid ml-1 text-[14px] fa-caret-down"></i>
                    </a>
                    <ul v-if="dropShow === 3" class="bg-violet-600 text-[14px] font-semibold text-center font-normal rounded-lg md:absolute z-50">
                        <template v-if="!!$page.props.auth.user">
                            <li>
                                <Link :href="route('dashboard')" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Dashboard</Link>
                            </li>
                            <li>
                                <Link :href="route('logout')" method="post" as="button" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Logout</Link>
                            </li>
                        </template>
                        <template v-else>
                            <li>
                                <Link :href="route('login')" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Login</Link>
                            </li>
                            <li>
                                <Link :href="route('register')" class="!block py-1 whitespace-nowrap rounded-b-lg px-8 hover:bg-violet-700">Signup</Link>
                            </li>
                        </template>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</template>


