<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";

const products = ref({}),
    baseUrl = window.location.origin,
    heading = ref(),
    breadCrum = ref()


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const displayProducts = () =>{
    const type = window.location.href.split('/')[4]
    if (!!type && type === 'men'){
        heading.value = 'Products for Men'
        breadCrum.value = 'Men Products'
        axios
            .get('/display-men-products/')
            .then((response)=>{
                products.value = response.data
            })
    } else if (!!type && type === 'women'){
        heading.value = 'Products for Women'
        breadCrum.value = 'Women Products'
        axios
            .get('/display-women-products/')
            .then((response)=>{
                products.value = response.data
            })
    } else {
        heading.value = 'All Products'
        breadCrum.value = 'All Products'
        axios
            .get('/display-all-products/')
            .then((response)=>{
                products.value = response.data
            })
    }
}

const openProduct = (slug) =>{
    router.visit('/product-detail/'+slug)
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
            <section class="relative">
                <div class="container py-20">
                    <div class="grid grid-cols-1 pb-8 text-center mt-10">
                        <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white">
                            {{ heading }}
                        </h3>
                    </div>
                    <div class="text-center">
                        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white">
                                <Link :href="route('welcome-home')">Home</Link>
                            </li>
                            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white">
                                {{ breadCrum }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                        <div @click="openProduct(data?.product_slug)" v-for="data in products" class="group cursor-pointer my-10 relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit">
                            <div class="relative overflow-hidden">
                                <div class="relative overflow-hidden rounded-lg h-[200px]">
                                   <img alt="image" class="rounded-lg min-h-[200px] min-h-full shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500" :src="baseUrl+'/storage/images/products/'+data.image[0].name">
                                 </div>
                                <div class="absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500">
                                    <div class="btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                        Buy Now
                                    </div>
                                </div>
                                <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                       <i class="mdi mdi-plus"></i>
                                    </div>
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
                </div>
            </section>
        </UserLayout>
    </div>
</template>
