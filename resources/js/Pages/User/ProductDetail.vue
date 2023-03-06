<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import UserLayout from '@/Layouts/UserLayout.vue'
import {onMounted, ref} from "vue";

const baseUrl = window.location.origin,
    showSubscribe = ref({first: 0, second:0}),
    product = ref({size:'', subscription:''}),
    error = ref({size:'', subscription:''})

const props = defineProps({
    product_detail: Object,
});

const subValidation = () =>{
    error.value = {size:'', subscription:''}
    if (!product.value.size)
        error.value.size='*select a size'
    if (!product.value.subscription)
        error.value.subscription='*select a subscription option'
    return error.value.size === '' && error.value.subscription === ''
}
const showSubscribeSecond = () =>{
    const valid = subValidation()
    if (valid)
        showSubscribe.value.second = 1
}
const monthlyPayment = () =>{
    if (parseInt(product.value.subscription) === 1){
        let test = parseInt(props.product_detail?.data?.price)/3
        return test.toFixed(2)
    }
    else if (parseInt(product.value.subscription) === 2){
        let test = parseInt(props.product_detail?.data?.price)/6
        return test.toFixed(2)
    }
    else if (parseInt(product.value.subscription) === 3){
        let test = parseInt(props.product_detail?.data?.price)/9
        return test.toFixed(2)
    }
}

const addCart = () =>{
    const valid = subValidation()
    if (valid){
        axios
            .post('/addToCart', product.value)
            .then((response)=>{
                if(response.data.success){
                    if(!props?.auth)
                        router.visit('/cart-login')
                }
            })
    }
}

onMounted(()=>{
    console.log(!!props?.auth)

})
</script>
<template>
    <Head title="Product Detail" />
    <div class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">
        <UserLayout>
            <section class="relative pt-28 md:pb-24 pb-16">
                <div class="container">
                    <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-5">
                            <img :src="baseUrl+'/storage/images/products/'+product_detail?.data?.image[0]?.name" class="rounded-md shadow dark:shadow-gray-700" alt="">
                            <div class="bg-slate-800 rounded-md shadow shadow-gray-800 mt-[30px] p-6">
                                <div v-if="!!product_detail?.data?.category" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Category</span>
                                    <span class="font-medium block">{{ product_detail?.data?.category }}</span>
                                </div>
                                <div v-if="!!product_detail?.data?.sub_category" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Sub Category</span>
                                    <span class="font-medium block">{{ product_detail?.data?.sub_category }}</span>
                                </div>
                                <div v-if="!!product_detail?.data?.style" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Style</span>
                                    <span class="font-medium block">{{ product_detail?.data?.style }}</span>
                                </div>
                                <div v-if="!!product_detail?.data?.tier_level" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Tier Level</span>
                                    <span class="font-medium block">{{ product_detail?.data?.tier_level }}</span>
                                </div>
                                <div v-if="!!product_detail?.data?.safety" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Safety Resistance</span>
                                    <span class="font-medium block">{{ product_detail?.data?.safety }}</span>
                                </div>
                                <div v-if="!!product_detail?.data?.material" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Material</span>
                                    <span class="font-medium block">{{ product_detail?.data?.material }}</span>
                                </div>
                                <div v-if="product_detail?.data?.size?.length > 0" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">Available Sizes</span>
                                    <span class="flex space-x-2">
                                        <span class="flex px-2 py-1 rounded bg-gray-600" v-for="size in product_detail?.data?.size">
                                            {{ size?.name }}
                                        </span>
                                    </span>
                                </div>
                                <div v-if="!!product_detail?.data?.gender" class="mt-4">
                                    <span class="font-medium text-slate-400 block mb-1">For Gender</span>
                                    <span class="font-medium block">{{ product_detail?.data?.gender }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-7 lg:ml-8">
                            <h5 class="md:text-2xl text-xl font-semibold">{{ product_detail?.data?.product_name }}</h5>
                            <span class="font-medium text-slate-400 block mt-2">Product Decription:</span>
                            <p class="text-slate-400 mt-4">{{ product_detail?.data?.description }}</p>
                            <div class="mt-4">
                                <span class="text-lg font-medium text-slate-400 block">Price</span>
                                <span class="tmd:text-2xl text-xl font-semibold block mt-2">${{ product_detail?.data?.price }}</span>
                            </div>
                            <div class="mt-6">
                                <span @click="showSubscribe.first = 1" class="cursor-pointer px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                    Subscribe Now
                                </span>
                            </div>
                            <div v-if="showSubscribe.first === 1" class="grid grid-cols-1 mt-8">
                                <div class="bg-slate-800 rounded-md shadow shadow-gray-800 p-6">
                                    <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                         Select Subscription Type
                                        <span v-if="!!error.subscription" class="text-red-600 font-bold text-sm ml-2">{{error.subscription}}</span>
                                    </div>
                                    <div v-if="!!product_detail?.data?.category" class="my-4">
                                         <div class="p-2 flex items-center" v-for="data in product_detail?.data?.subscription">
                                             <input @click="product.subscription = data?.subscription_name?.id" :checked="product.subscription === data?.subscription_name?.id" class="text-gray-600 mr-2 focus:ring-0" name="subscription" :id="'sub'+data.subscriptions_id+'scribe'" type="radio" >
                                             <label :for="'sub'+data.subscriptions_id+'scribe'">{{data?.subscription_name?.name }} subscription</label>
                                         </div>
                                    </div>
                                    <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                        Select Size
                                        <span v-if="!!error.size" class="text-red-600 font-bold text-sm ml-2">{{error.size}}</span>
                                    </div>
                                    <div v-if="product_detail?.data?.size?.length > 0" class="mt-4">
                                        <div class="flex space-x-2 p-2">
                                            <span @click="product.size = size.id" :class="{'!bg-gray-800': product.size === size.id}" class="px-2 py-1 rounded bg-gray-600 cursor-pointer hover:bg-gray-800 border border-white" v-for="size in product_detail?.data?.size">
                                                {{ size?.name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5 flex justify-center">
                                        <span @click="showSubscribeSecond()" class="cursor-pointer px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                             Show Subscription Schedule
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="showSubscribe.second === 1" class="grid grid-cols-1 mt-8">
                                <div class="bg-slate-800 rounded-md shadow shadow-gray-800 p-6">
                                    <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                        Product Total Price
                                    </div>
                                    <div v-if="!!product_detail?.data?.price" class="my-4">
                                        <div class="p-2 flex items-center">
                                            $ {{ product_detail?.data?.price}}
                                        </div>
                                    </div>
                                    <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                        Monthly Payment
                                    </div>
                                    <div class="mt-4">
                                        <div class="p-2 flex items-center">
                                            You have to pay approximately $ {{ monthlyPayment() }} every month
                                        </div>
                                    </div>
                                    <div class="p-5 flex justify-center">
                                        <span @click="addCart()" class="cursor-pointer px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                             Add to Cart
                                        </span>
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
<style scoped>

</style>
