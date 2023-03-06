<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Giglink - Tailwind CSS NFT Marketplace Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template">
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="1.0.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.ico')}}">
    <!-- Css -->
    <link href="{{asset('/assets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{asset('/assets/libs/@iconscout/unicons/css/line.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/tailwind.css')}}">

</head>

<body class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
<span class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"></span>
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <a class="logo pl-0" href="index.html">
            <img src="assets/images/logo-icon-28.png" class="inline-block sm:hidden"  alt="">
            <div class="sm:block hidden">
                <img src="assets/images/logo-dark.png" class="inline-block dark:hidden h-7" alt="">
                <img src="assets/images/logo-white.png" class="hidden dark:inline-block h-7" alt="">
            </div>
        </a>
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
        <ul class="buy-button list-none mb-0">
            <li class="inline-block mb-0">
                <div class="form-icon relative">
                    <i class="uil uil-search text-lg absolute top-1/2 -translate-y-1/2 left-3"></i>
                    <input type="text" class="form-input pl-10 rounded-3xl sm:w-44 w-28 bg-white dark:bg-slate-900" name="s" id="searchItem" placeholder="Search...">
                </div>
            </li>
            <li class="inline-block pl-1 mb-0">
                <a id="connectWallet" class="btn btn-icon rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="uil uil-wallet"></i></a>
            </li>
            <li class="inline-block pl-1 mb-0">
                <a href="" class="btn btn-icon rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><img src="assets/images/client/05.jpg" class="rounded-full" alt=""></a>
            </li>
        </ul>
        <div id="navigation">
            <ul class="navigation-menu justify-end">
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="index.html" class="sub-menu-item">Home One</a></li>
                        <li><a href="index-two.html" class="sub-menu-item">Home Two</a></li>
                        <li><a href="index-three.html" class="sub-menu-item">Home Three</a></li>
                        <li><a href="index-four.html" class="sub-menu-item">Home Four <span class="bg-gray-50 dark:bg-slate-800 text-[10px] shadow shadow-gray-300 dark:shadow-gray-700 font-bold px-2.5 py-0.5 rounded h-5 ml-1">Light</span></a></li>
                        <li><a href="index-five.html" class="sub-menu-item">Home Five <span class="bg-gray-50 dark:bg-slate-800 text-[10px] shadow shadow-gray-300 dark:shadow-gray-700 font-bold px-2.5 py-0.5 rounded h-5 ml-1">Light</span></a></li>
                        <li><a href="index-six.html" class="sub-menu-item">Home Six <span class="bg-gray-50 dark:bg-slate-800 text-[10px] shadow shadow-gray-300 dark:shadow-gray-700 font-bold px-2.5 py-0.5 rounded h-5 ml-1">Light</span></a></li>
                    </ul>
                </li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Explore</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="explore-one.html" class="sub-menu-item"> Explore One</a></li>
                        <li><a href="explore-two.html" class="sub-menu-item"> Explore Two</a></li>
                        <li><a href="explore-three.html" class="sub-menu-item"> Explore Three</a></li>
                        <li><a href="auction.html" class="sub-menu-item">Live Auction</a></li>
                        <li><a href="item-detail.html" class="sub-menu-item"> Item Detail</a></li>
                        <li><a href="activity.html" class="sub-menu-item"> Activities</a></li>
                        <li><a href="collections.html" class="sub-menu-item">Collections</a></li>
                        <li><a href="upload-work.html" class="sub-menu-item">Upload Works</a></li>
                    </ul>
                </li>
                <li><a href="wallet.html" class="sub-menu-item">Wallet</a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="aboutus.html" class="sub-menu-item">About Us</a></li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Creator </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="creators.html" class="sub-menu-item"> Creators</a></li>
                                <li><a href="creator-profile.html" class="sub-menu-item"> Creator Profile</a></li>
                                <li><a href="creator-profile-edit.html" class="sub-menu-item"> Profile Edit</a></li>
                                <li><a href="become-creator.html" class="sub-menu-item"> Become Creator</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="blogs.html" class="sub-menu-item"> Blogs</a></li>
                                <li><a href="blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="login.html" class="sub-menu-item"> Login</a></li>
                                <li><a href="signup.html" class="sub-menu-item"> Signup</a></li>
                                <li><a href="reset-password.html" class="sub-menu-item"> Forgot Password</a></li>
                                <li><a href="lock-screen.html" class="sub-menu-item"> Lock Screen</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="comingsoon.html" class="sub-menu-item"> Coming Soon</a></li>
                                <li><a href="maintenance.html" class="sub-menu-item"> Maintenance</a></li>
                                <li><a href="error.html" class="sub-menu-item"> 404!</a></li>
                                <li><a href="thankyou.html" class="sub-menu-item"> Thank you</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Help Center </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="helpcenter-overview.html" class="sub-menu-item"> Overview</a></li>
                                <li><a href="helpcenter-faqs.html" class="sub-menu-item"> FAQs</a></li>
                                <li><a href="helpcenter-guides.html" class="sub-menu-item"> Guides</a></li>
                                <li><a href="helpcenter-support.html" class="sub-menu-item"> Support</a></li>
                            </ul>
                        </li>
                        <li><a href="terms.html" class="sub-menu-item">Terms Policy</a></li>
                        <li><a href="privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                    </ul>
                </li>
                <li><a href="contact.html" class="sub-menu-item">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="relative md:pt-48 pt-36 overflow-hidden">
    <div class="container">
        <div class="grid grid-cols-1 justify-center text-center mt-10">
            <div class="relative">
                <div class="relative mb-5">
                    <h1 class="font-bold lg:leading-snug leading-snug text-4xl lg:text-6xl">Discover rate <br> collection or <span class="bg-gradient-to-l from-red-600 to-violet-600 text-transparent bg-clip-text">Arts & NFTs</span></h1>

                    <div class="overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/10 dark:after:bg-violet-600/30 after:-top-[50px] after:left-[30%] after:-z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"></div>

                    <div class="overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/20 dark:after:bg-violet-600/40 after:bottom-[0] after:right-[15%] after:-z-1 after:rounded-full after:animate-ping"></div>
                </div>
                <p class="text-slate-400 dark:text-white/70 text-lg max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>

                <div class="mt-8">
                    <a href="explore-one.html" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full">Explore now</a>
                </div>
            </div>
        </div>
        <div class="relative animate-[spin_30s_linear_infinite] -z-1">
            <span class="after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"></span>
            <span class="after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:rotate-90 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"></span>
        </div>
    </div>
    <div class="container md:mt-36 mt-24">
        <div class="md:flex justify-between items-center">
            <div class="md:w-10/12 md:text-left text-center">
                <h3 class="md:text-[30px] text-[26px] font-semibold">Top Collections</h3>
            </div>
            <div class="md:w-2/12 text-right md:block hidden">
                <a href="collections.html" class="btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">See More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
        <div class="grid relative grid-cols-1 mt-10">
            <div class="tiny-four-icon-item">
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/1.jpg" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/1.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">Digital Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@CutieGirl</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/2.gif" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/2.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">GIF Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@ButterFly</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/3.jpg" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/3.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">Sports Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@NorseQueen</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/4.jpg" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/4.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">Photography Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@BigBull</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/5.jpg" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/5.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">Illustrations Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@Angel</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tiny-slide">
                    <div class="group relative overflow-hidden bg-white dark:bg-slate-900 rounded-lg p-3 shadow dark:shadow-gray-800 ease-in-out duration-500 m-2">
                        <img src="assets/images/items/6.jpg" class="rounded-lg" alt="">
                        <div class="relative p-4 -mt-14">
                            <div class="relative inline-block">
                                <img src="assets/images/avatar/6.jpg" class="h-16 rounded-md shadow-md dark:shadow-gray-800" alt="">
                                <i class="mdi mdi-check-decagram text-emerald-600 text-2xl absolute -bottom-3 -right-2"></i>
                            </div>
                            <div class="mt-3">
                                <a href="explore-one.html" class="font-semibold block text-[18px] hover:text-violet-600">Animations Collection</a>
                                <span class="text-slate-400 mt-1 text-sm"><span class="italic">by</span> <a href="creator-profile.html" class="text-violet-600 font-medium">@CrazyAnyone</a></span>
                                <span class="text-slate-400 block text-[16px] mt-1">25 Items</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-6 md:hidden">
            <div class="text-center">
                <a href="collections.html" class="btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">See More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
{{--<!-- End Hero -->--}}

{{--<!-- Start -->--}}
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid grid-cols-1 text-center">
            <h3 class="md:text-[30px] text-[26px] font-semibold">Discover Items</h3>
        </div><!--end grid-->
        <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/1.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/1.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@StreetBoy</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Genuine Undead #3902</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/2.gif" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>

                    <div class="absolute bottom-2 right-0 left-0 mx-auto text-center bg-gradient-to-r from-violet-600 to-red-600 text-white inline-table text-lg px-3 rounded-full">
                        <i class="uil uil-clock align-middle mr-1"></i> <small id="auction-item-1" class="font-bold"></small>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/2.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@CutieGirl</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Windchime #768</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/2.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/items/3.gif" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@ButterFly</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Probably A Label #3277</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/3.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/3.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@NorseQueen</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Probably A Label #1711</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/3.gif" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/4.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@BigBull</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Shibuya Scramble Punks</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/4.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/5.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@Angel</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Probably A Label #650</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/5.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>

                    <div class="absolute bottom-2 right-0 left-0 mx-auto text-center bg-gradient-to-r from-violet-600 to-red-600 text-white inline-table text-lg px-3 rounded-full">
                        <i class="uil uil-clock align-middle mr-1"></i> <small id="auction-item-5" class="font-bold"></small>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/avatar/6.jpg" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@CrazyAnyone</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Looki#0147</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->

            <div class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                <div class="relative overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="assets/images/items/6.jpg" class="rounded-lg shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" alt="">
                    </div>

                    <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                        <a href="item-detail.html" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-lightning-bolt"></i> Buy Now</a>
                    </div>

                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"><i class="mdi mdi-plus"></i></a>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="flex items-center">
                        <img src="assets/images/items/5.gif" class="rounded-full h-8 w-8" alt="">
                        <a href="creator-profile.html" class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">@Princess</a>
                    </div>

                    <div class="my-3">
                        <a href="item-detail.html" class="font-semibold hover:text-violet-600">Poob #285</a>
                    </div>

                    <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.5 ETH</span>
                        </div>

                        <div>
                            <span class="text-[16px] font-medium text-slate-400 block">Highest Bid</span>
                            <span class="text-[16px] font-semibold block"><i class="mdi mdi-ethereum"></i> 3.55 ETH</span>
                        </div>
                    </div>
                </div>
            </div><!--end content-->
        </div><!--end grid-->

        <div class="grid grid-cols-1 mt-6">
            <div class="text-center">
                <a href="explore-one.html" class="btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">Explore More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3 class="md:text-[30px] text-[26px] font-semibold">Best Creators & Sellers</h3>
        </div><!--end grid-->

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/1.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Steven Townsend</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@StreetBoy</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/2.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Tiffany Betancourt</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@CutieGirl</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/items/3.gif" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Jacqueline Burns</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@ButterFly</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/3.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Mari Harrington</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@NorseQueen</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/4.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Floyd Glasgow</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@BigBull</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/5.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Donna Schultz</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@Angel</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/6.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Joshua Morris</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@CrazyAnyone</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/items/5.gif" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Rosaria Vargas</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@Princess</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->

            <div class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                <div class="flex items-center">
                    <div class="relative inline-block">
                        <img src="assets/images/avatar/7.jpg" class="h-16 rounded-md" alt="">
                        <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                    </div>

                    <div class="ml-3">
                        <a href="creator-profile.html" class="font-semibold block hover:text-violet-600">Carl Williams</a>
                        <span class="text-slate-400 text-sm block mt-0.5">@LooserBad</span>
                    </div>
                </div>

                <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
            </div>
            <!--end content-->
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">Q&A</h3>

            <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>
        </div><!--end grid-->

        <div class="flex justify-center mt-10">
            <div class="lg:w-2/3">
                <div id="accordion-collapseone" data-accordion="collapse" class="mt-6">
                    <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden">
                        <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                            <button type="button" class="flex justify-between items-center p-5 w-full font-semibold text-left" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                <span>How does it work ?</span>
                                <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-5">
                                <p class="text-slate-400 dark:text-gray-400">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                        <h2 class="text-base font-semibold" id="accordion-collapse-heading-2">
                            <button type="button" class="flex justify-between items-center p-5 w-full font-semibold text-left" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                <span>Do I need a designer to use Giglink ?</span>
                                <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5">
                                <p class="text-slate-400 dark:text-gray-400">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                        <h2 class="text-base font-semibold" id="accordion-collapse-heading-3">
                            <button type="button" class="flex justify-between items-center p-5 w-full font-semibold text-left" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                <span>What do I need to do to start selling ?</span>
                                <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-5">
                                <p class="text-slate-400 dark:text-gray-400">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                        <h2 class="text-base font-semibold" id="accordion-collapse-heading-4">
                            <button type="button" class="flex justify-between items-center p-5 w-full font-semibold text-left" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                                <span>What happens when I receive an order ?</span>
                                <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                            <div class="p-5">
                                <p class="text-slate-400 dark:text-gray-400">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">Have Question ? Get in touch!</h3>

            <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>

            <div class="mt-6">
                <a href="helpcenter-support.html" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mr-2 mt-2"><i class="uil uil-phone"></i> Contact us</a>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section> <!--end section-->
<!-- End -->

<!-- Start Footer -->
<footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200 mt-24">
    <div class="container">
        <div class="grid grid-cols-1">
            <div class="relative py-16">
                <div class="relative w-full">
                    <div class="relative -top-40 bg-white dark:bg-slate-900 lg:px-8 px-6 py-10 rounded-xl shadow dark:shadow-gray-800 overflow-hidden">
                        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px]">
                            <div class="md:text-left text-center z-1">
                                <h3 class="text-[26px] font-semibold text-slate-900 dark:text-white">Subscribe to Newsletter!</h3>
                                <p class="text-slate-400 max-w-xl mx-auto">Subscribe to get latest updates and information.</p>
                            </div>

                            <div class="subcribe-form z-1">
                                <form class="relative max-w-lg md:ml-auto">
                                    <input type="email" id="subcribe" name="email" class="pt-4 pr-40 pb-4 pl-6 w-full h-[50px] outline-none text-slate-900 dark:text-white rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-800" placeholder="Enter your email :">
                                    <button type="submit" class="btn absolute top-[2px] right-[3px] h-[46px] bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full">Subscribe</button>
                                </form><!--end form-->
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
                                <img src="assets/images/logo-white.png" alt="">
                            </a>
                            <p class="mt-6 text-gray-300">Buy, sell and discover exclusive digital assets by the top artists of NFTs world.</p>

                        </div><!--end col-->

                        <div class="lg:col-span-2 md:col-span-4">
                            <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Giglink</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="explore-one.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Explore Item</a></li>
                                <li class="mt-[10px]"><a href="auction.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Live Auction</a></li>
                                <li class="mt-[10px]"><a href="activity.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Activities</a></li>
                                <li class="mt-[10px]"><a href="wallet.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Wallets</a></li>
                                <li class="mt-[10px]"><a href="creators.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Creators</a></li>
                            </ul>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Usefull Links</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="aboutus.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> About Us</a></li>
                                <li class="mt-[10px]"><a href="blogs.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Blog & News</a></li>
                                <li class="mt-[10px]"><a href="terms.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Terms & Condition</a></li>
                                <li class="mt-[10px]"><a href="privacy.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Privacy policy</a></li>
                                <li class="mt-[10px]"><a href="login.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                                <li class="mt-[10px]"><a href="contact.html" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Contact Us</a></li>
                            </ul>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Download the Giglink app</h5>

                            <ul class="list-none mt-6">
                                <li class="inline"><img src="assets/images/app.png" class="h-9 inline-block" alt=""></li>
                                <li class="inline"><img src="assets/images/playstore.png" class="h-9 inline-block" alt=""></li>
                            </ul>

                            <div class="mt-6">
                                <h5 class="tracking-[1px] text-lg text-gray-100 font-semibold">Contact Details</h5>

                                <div class="flex mt-6">
                                    <i data-feather="mail" class="w-5 h-5 text-violet-600 mr-3 mt-1"></i>
                                    <div class="">
                                        <a href="mailto:contact@example.com" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out">contact@example.com</a>
                                    </div>
                                </div>

                                <div class="flex mt-6">
                                    <i data-feather="phone" class="w-5 h-5 text-violet-600 mr-3 mt-1"></i>
                                    <div class="">
                                        <a href="tel:+152534-468-854" class="text-[16px] text-gray-300 hover:text-gray-400 duration-500 ease-in-out">+152 534-468-854</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
        <div class="container text-center">
            <div class="grid md:grid-cols-2 items-center gap-6">
                <div class="md:text-left text-center">
                    <p class="mb-0 text-gray-300">© <script>document.write(new Date().getFullYear())</script> Giglink. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                </div>

                <ul class="list-none md:text-right text-center">
                    <!-- <li class="inline"><a href="https://1.envato.market/giglink" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li> -->
                    <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="inline"><a href="https://www.behance.net/shreethemes" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-behance" title="Behance"></i></a></li>
                    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-linkedin" title="Linkedin"></i></a></li>
                    <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="inline"><a href="mailto:support@shreethemes.in" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-violet-600 dark:hover:border-violet-600 hover:bg-violet-600 dark:hover:bg-violet-600"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                </ul><!--end icon-->
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<div class="fixed top-1/4 -left-2 z-50 hidden sm:block">
    <span class="relative inline-block rotate-90">
        <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
        <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
            <i class="uil uil-moon text-[20px] text-yellow-500"></i>
            <i class="uil uil-sun text-[20px] text-yellow-500"></i>
            <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
        </label>
    </span>
</div>
<div class="fixed top-1/2 -left-11 z-50 hidden sm:block">
    <a href="https://1.envato.market/shreethemes-portfolio" target="_blank" class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-700 font-semibold"><i class="mdi mdi-cart-outline mr-1"></i> Download</a>
</div>
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-violet-600 text-white leading-9"><i class="uil uil-arrow-up"></i></a>
<script src="{{asset('assets/libs/tiny-slider/min/tiny-slider.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.init.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
