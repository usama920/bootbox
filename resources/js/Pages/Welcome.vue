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
            products.value = response.data
        })
}

const openProduct = (slug) =>{
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
                                <Link :href="route('show_products_all')" class="btn bg-gray-700 hover:bg-gray-900 border-white hover:border-white text-white rounded-full">Explore Products</Link>
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
                                 <Link :href="route('show_products_all')" class="btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out">Explore More <i class="uil uil-arrow-right"></i></Link>
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
                                     <div class="ml-3">
                                         <span class="font-semibold block hover:text-violet-600">Steven Townsend</span>
                                         <span class="text-slate-400 whitespace-nowrap truncate... text-sm block mt-0.5">One on best product. Highly recommended</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="container md:mt-24 mt-16">
                         <div class="grid grid-cols-1 text-center">
                             <h3 class="mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold">Q&A</h3>
                             <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Giglink with their fans and unique token collectors!</p>
                         </div>
                         <div id="accordionExample">
                             <div class="rounded-t-lg bg-transparent dark:border-neutral-600 dark:bg-neutral-800">
                                 <h2 class="mb-0" id="headingOne">
                                     <button class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-transparent py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-transparent [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                         type="button" data-te-collapse-init data-te-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                         How does it work ?
                                        <span class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                                        </span>
                                     </button>
                                 </h2>
                                 <div id="collapseOne" class="!visible" data-te-collapse-item data-te-collapse-show aria-labelledby="headingOne" data-te-parent="#accordionExample">
                                     <div class="py-4 px-5">
                                         <strong>This is the first item's accordion body.</strong> It is
                                         shown by default, until the collapse plugin adds the appropriate
                                         classes that we use to style each element. These classes control
                                         the overall appearance, as well as the showing and hiding via CSS
                                         transitions. You can modify any of this with custom CSS or
                                         overriding our default variables. It's also worth noting that just
                                         about any HTML can go within the <code>.accordion-body</code>,
                                         though the transition does limit overflow.
                                     </div>
                                 </div>
                             </div>
                             <div class=" bg-transparent dark:border-neutral-600 dark:bg-neutral-800">
                                 <h2 class="mb-0" id="headingTwo">
                                     <button class="group relative flex w-full items-center rounded-none border-0 bg-transparent py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-transparent [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                         type="button"
                                         data-te-collapse-init
                                         data-te-collapse-collapsed
                                         data-te-target="#collapseTwo"
                                         aria-expanded="false"
                                         aria-controls="collapseTwo">
                                         Accordion Item #2
                                         <span class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                             <i class="fa-sharp fa-solid fa-caret-down"></i>
                                         </span>
                                     </button>
                                 </h2>
                                 <div id="collapseTwo" class="!visible hidden" data-te-collapse-item aria-labelledby="headingTwo" data-te-parent="#accordionExample">
                                     <div class="py-4 px-5">
                                         <strong>This is the second item's accordion body.</strong> It is
                                         hidden by default, until the collapse plugin adds the appropriate
                                         classes that we use to style each element. These classes control
                                         the overall appearance, as well as the showing and hiding via CSS
                                         transitions. You can modify any of this with custom CSS or
                                         overriding our default variables. It's also worth noting that just
                                         about any HTML can go within the <code>.accordion-body</code>,
                                         though the transition does limit overflow.
                                     </div>
                                 </div>
                             </div>
                             <div class="rounded-b-lg bg-transparent">
                                 <h2 class="accordion-header mb-0" id="headingThree">
                                     <button class="group relative flex w-full items-center border-0 bg-transparent py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-transparent [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                                         type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                         Accordion Item #3
                                        <span class="ml-auto -mr-1 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                                        </span>
                                     </button>
                                 </h2>
                                 <div id="collapseThree"
                                     class="!visible hidden"
                                     data-te-collapse-item
                                     aria-labelledby="headingThree"
                                     data-te-parent="#accordionExample">
                                     <div class="py-4 px-5">
                                         <strong>This is the third item's accordion body.</strong> It is
                                         hidden by default, until the collapse plugin adds the appropriate
                                         classes that we use to style each element. These classes control
                                         the overall appearance, as well as the showing and hiding via CSS
                                         transitions. You can modify any of this with custom CSS or
                                         overriding our default variables. It's also worth noting that just
                                         about any HTML can go within the <code>.accordion-body</code>,
                                         though the transition does limit overflow.
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
                                 <Link :href="route('contact')" class="btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mr-2 mt-2">
                                     <i class="uil uil-phone"></i>
                                     Contact us
                                 </Link>
                             </div>
                         </div>
                     </div>
                 </section>
             </section>
        </UserLayout>
    </div>
</template>
