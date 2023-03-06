<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";

const products = ref({}),
    baseUrl = window.location.origin

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const displayProducts = () =>{
    axios
        .get('/display-products')
        .then((response)=>{
            console.log(products.value = response.data)
        })
}

const openProduct = (slug) =>{
    console.log(slug)
    router.visit('product-detail/'+slug)
}

onMounted(()=>{
    displayProducts()
})
</script>

<template>
    <Head title="Home" />
    <div class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
        <span class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"></span>
        <UserLayout>
             <section class="relative md:pt-48 pt-36 overflow-hidden">
                <div class="container">
                    <div class="grid grid-cols-1 justify-center text-center mt-10">
                        <div class="relative">
                            <div class="relative mb-5">
                                <h1 class="font-bold lg:leading-snug leading-snug text-4xl lg:text-6xl">Boot Box <br> Shoes <span class="bg-gradient-to-l from-red-600 to-violet-600 text-transparent bg-clip-text">Collection</span></h1>

                                <div class="overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/10 dark:after:bg-violet-600/30 after:-top-[50px] after:left-[30%] after:-z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"></div>

                                <div class="overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/20 dark:after:bg-violet-600/40 after:bottom-[0] after:right-[15%] after:-z-1 after:rounded-full after:animate-ping"></div>
                            </div>
                            <p class="text-slate-400 dark:text-white/70 text-lg max-w-xl mx-auto">We have best boots collection with quality and comfort!</p>
                            <div class="mt-8">
                                <a href="#" class="btn bg-gray-700 hover:bg-gray-900 border-white hover:border-white text-white rounded-full">Explore Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative animate-[spin_30s_linear_infinite] -z-1">
                        <span class="after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"></span>
                        <span class="after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:rotate-90 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"></span>
                    </div>
                </div>
                 <section class="relative md:py-24 py-16">
                     <div class="container">
                         <div class="grid grid-cols-1 text-center">
                             <h3 class="md:text-[30px] text-[26px] font-semibold">Discover Items</h3>
                         </div>
                         <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
                             <div @click="openProduct(data?.product_slug)"  v-for="data in products" class="group relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                                 <div class="relative overflow-hidden">
                                     <div class="relative overflow-hidden rounded-lg h-[200px]">
                                         <img alt="image" class="rounded-lg min-h-[200px] min-h-full shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" :src="baseUrl+'/storage/images/products/'+data.image[0].name">
                                     </div>
                                     <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                                         <a href="javascript:void(0)" class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                             <i class="mdi mdi-lightning-bolt"></i> Buy Now
                                         </a>
                                     </div>
                                     <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                                         <a href="javascript:void(0)" class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                             <i class="mdi mdi-plus"></i>
                                         </a>
                                     </div>
                                 </div>
                                 <div class="mt-3">
                                     <div class="flex items-center">
                                         <div class="ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600">{{data?.category}}/{{data?.sub_category}}</div>
                                     </div>
                                     <div class="my-3">
                                         <div class="font-semibold px-2 hover:text-violet-600">{{data?.product_name}}</div>
                                     </div>
                                     <div class="flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700">
                                         <div>
                                             <span class="text-[16px] font-medium text-slate-400 block">Price</span>
                                             <span class="text-[16px] font-semibold block">${{data?.price}}</span>
                                         </div>
                                         <div>
                                             <span class="text-[16px] font-medium text-slate-400 block">Subscription</span>
                                             <span class="text-[16px] font-semibold block">Available</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="grid grid-cols-1 mt-6">
                             <div class="text-center">
                                 <a href="#" class="btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">Explore More <i class="uil uil-arrow-right"></i></a>
                             </div>
                         </div>
                     </div>
                     <div class="container md:mt-24 mt-16">
                         <div class="grid grid-cols-1 text-center">
                             <h3 class="md:text-[30px] text-[26px] font-semibold">Customer Review & Comments</h3>
                         </div>
                         <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]">
                             <div v-for="data in 6" class="flex justify-between items-center p-3 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800">
                                 <div class="flex items-center">
                                     <div class="relative inline-block">
                                         <img src="/assets/images/avatar/1.jpg" class="h-16 rounded-md" alt="">
                                         <i class="mdi mdi-check-decagram text-emerald-600 text-lg absolute -top-2 -right-2"></i>
                                     </div>
                                     <div class="ml-3">
                                         <a href="#" class="font-semibold block hover:text-violet-600">Steven Townsend</a>
                                         <span class="text-slate-400 text-sm block mt-0.5">@StreetBoy</span>
                                     </div>
                                 </div>
                                 <a href="" class="btn btn-icon rounded-full bg-violet-600/5 hover:bg-violet-600 border-violet-600/10 hover:border-violet-600 text-violet-600 hover:text-white"><i class="uil uil-user-plus text-[20px]"></i></a>
                             </div>
                         </div>
                     </div>
                     <div class="container md:mt-24 mt-16">
                         <div class="grid grid-cols-1 text-center">
                             <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">Q&A</h3>

                             <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>
                         </div>

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
                         </div>
                     </div>

                     <div class="container md:mt-24 mt-16">
                         <div class="grid grid-cols-1 text-center">
                             <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">Have Question ? Get in touch!</h3>
                             <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>
                             <div class="mt-6">
                                 <a href="#" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mr-2 mt-2"><i class="uil uil-phone"></i> Contact us</a>
                             </div>
                         </div>
                     </div>
                 </section>
             </section>
        </UserLayout>
    </div>
</template>
