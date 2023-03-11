<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>
<template>
    <nav id="topnav" class="defaultscroll is-sticky py-2">
        <div class="container">
            <Link :href="route('welcome-home')" class="logo pl-0" href="#">
                <div>
                    <img src="/assets/logo/logo.jpeg" class="inline-block sm:hidden h-20"  alt="">
                    <div class="sm:block hidden">
                        <img src="/assets/logo/logo.jpeg" class="inline-block h-20" alt="">
                    </div>
                </div>
            </Link>
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="navigation-menu buy-button items-center list-none mb-0">
                <li class="has-submenu parent-menu-item">
                    <a><i class="fas fa-user text-[20px]"></i></a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu">
                        <template v-if="!!$page.props.auth.user">
                            <li v-if="$page.props.auth.user?.roles_id === 1">
                                <Link :href="route('dashboard')" class="hover:text-violet-600 text-[15px] font-semibold">Dashboard</Link>
                            </li>
                            <li>
                                <Link :href="route('logout')" method="post" as="button" class="hover:text-violet-600 text-[15px] px-5 font-semibold">Logout</Link>
                            </li>
                        </template>
                        <template v-else>
                            <li>
                                <Link :href="route('login')" class="hover:text-violet-600 text-[15px] font-semibold">Login</Link>
                            </li>
                            <li>
                                <Link :href="route('register')" class="hover:text-violet-600 text-[15px] font-semibold">Signup</Link>
                            </li>
                        </template>
                    </ul>
                </li>
            </ul>
            <div id="navigation">
                <ul class="navigation-menu justify-center space-x-4">
                    <li>
                        <Link :href="route('welcome-home')" class="sub-menu-item">Home</Link>
                    </li>
                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)">Products</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li>
                                <Link :href="route('show_products_all')" class="sub-menu-item">All</Link>
                            </li>
                            <li>
                                <Link :href="route('show_products_men')" class="sub-menu-item">Men</Link>
                            </li>
                            <li>
                                <Link :href="route('show_products_women')" class="sub-menu-item">Women</Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <Link :href="route('cart')" class="sub-menu-item">Cart</Link>
                    </li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">About</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li>
                                <Link :href="route('about')" class="sub-menu-item">About Us</Link>
                            </li>
                            <li>
                                <Link :href="route('contact')" class="sub-menu-item">Contact Us</Link>
                            </li>
<!--                            <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>-->
<!--                                <ul class="submenu">-->
<!--                                    <li><a href="#" class="sub-menu-item"> Coming Soon</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> Maintenance</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> 404!</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> Thank you</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Help Center </a><span class="submenu-arrow"></span>-->
<!--                                <ul class="submenu">-->
<!--                                    <li><a href="#" class="sub-menu-item"> Overview</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> FAQs</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> Guides</a></li>-->
<!--                                    <li><a href="#" class="sub-menu-item"> Support</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li>
                                <Link :href="route('terms')" class="sub-menu-item">Terms Policy</Link>
                            </li>
                            <li>
                                <Link :href="route('privacy')" class="sub-menu-item">Privacy Policy</Link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


