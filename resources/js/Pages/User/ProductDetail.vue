<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, router, Link, useForm } from '@inertiajs/vue3';
import ModalDialog from '@/Components/ModalDialog.vue';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";
import { usePage } from '@inertiajs/vue3';

const { Toast, ConfirmToast } = commonFunctions(),
    user = ref(usePage())

const props = defineProps({
    product_detail: Object,
    canResetPassword: Boolean,
    status: String,
});

const loginForm = useForm({
        email: '',
        password: '',
        remember: false,
        cart: true
    }),
    registerForm = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
        cart: true
    }),
    baseUrl = window.location.origin,
    showSubscribe = ref({first: 0, second:0}),
    product = ref({size:'', subscription:'', slug:'', type:'', country:'', zipcode:'', state:'', city:'', address_1:'', address_2:'', phone:'', name:'',}),
    error = ref({size:'', slug:'', subscription:'', type:'', country:'', zipcode:'', state:'', city:'', address_1:'', address_2:'', phone:'', name:''}),
    disable = ref({show: false, text: 'Add to Cart'}),
    subscriptionPrice = ref({total:0, monthly:0, weekly:0})

const emptyError = () =>{
    error.value = {size:'', slug:'', subscription:'', type:'', country:'', zipcode:'', state:'', city:'', address_1:'', address_2:'', phone:'', name:''}
}
const submitRegister = () => {
    registerForm.post(route('register'), {
        onFinish: (()=>{
            registerForm.reset('password', 'password_confirmation')
            $('#registerModal').modal('hide')
            Toast.fire({icon: "success", title: "Account Registered Successfully"})
            user.value = usePage()
        })
    })
};

const submitLogin = () => {
    loginForm.post(route('login'), {
        onFinish: (()=>{
            loginForm.reset('password')
            $('#loginModal').modal('hide')
            Toast.fire({icon: "success", title: "Account Logged in Successfully"})
            user.value = usePage()
        })
    })
}

const subFirstValidation = () => {
    emptyError()
    if (!product.value.size)
        error.value.size='*select a size'
    if (!product.value.subscription)
        error.value.subscription='*select a subscription option'
    return error.value.size === '' && error.value.subscription === ''
}

const subValidation = () =>{
    emptyError()
    if (!product.value.address_1)
        error.value.address_1='*Address Lane 1 Required'
    if (!product.value.address_2)
        error.value.address_2='*Address Lane 2 Required'
    if (!product.value.zipcode)
        error.value.zipcode='*Zipcode Required'
    if (!product.value.city)
        error.value.city='*City Required'
    if (!product.value.country)
        error.value.country='*Country Required'
    if (!product.value.name)
        error.value.name='*Name Required'
    if (!product.value.phone)
        error.value.phone='*Phone Number Required'
    if (!product.value.state)
        error.value.state='*State Required'
    if (!product.value.subscription)
        error.value.subscription='*select a subscription option'
    if (!product.value.type)
        error.value.type='*select a subscription type'
    if (!product.value.size)
        error.value.size='*select a size'
    if (!product.value.slug){
        error.value.slug='*select a size'
        Toast.fire({icon: "error", title: "something went wrong"})
    }
    return error.value.size === '' && error.value.subscription === '' && error.value.type === ''
        && error.value.state === '' && error.value.phone === '' && error.value.slug === ''
        && error.value.name === '' && error.value.country === '' && error.value.city === ''
        && error.value.zipcode === '' && error.value.address_1 === '' && error.value.address_2 === ''
}

const showSubscribeSecond = () =>{
    const valid = subFirstValidation()
    if (valid){
        showSubscribe.value.second = 1
        subTotalPayment ()
    }
}

const subTotalPayment = () =>{
    let test = props.product_detail?.data?.subscription.filter(x=>x.subscription_types_id === product.value.subscription)
    subscriptionPrice.value.total = test[0]?.price
    let amount = 0;
    let weekly_amount = 0;
    if (parseInt(product.value.subscription) === 1){
        amount = parseInt(subscriptionPrice.value.total)/3
        weekly_amount = parseInt(subscriptionPrice.value.total)/12
    }
    else if (parseInt(product.value.subscription) === 2){
        amount = parseInt(subscriptionPrice.value.total)/6
        weekly_amount = parseInt(subscriptionPrice.value.total)/24 + 2.99
    }
    else if (parseInt(product.value.subscription) === 3){
        amount = parseInt(subscriptionPrice.value.total)/9
        weekly_amount = parseInt(subscriptionPrice.value.total)/32 + 2.99
    }
    else if (parseInt(product.value.subscription) === 4){
        amount = parseInt(subscriptionPrice.value.total)/12
        weekly_amount = parseInt(subscriptionPrice.value.total)/48 + 2.99
    }
    subscriptionPrice.value.monthly = amount.toFixed(2)
    subscriptionPrice.value.weekly = weekly_amount.toFixed(2)
}
const checkOutModal = () => {
    product.value.slug = props.product_detail?.data?.product_slug
    const valid = subValidation()
    if (valid) {
        if(!!user.value?.props?.auth?.user){
            $('#stripeModal').modal('show')
        }else
            $('#loginModal').modal('show');
    }
}

const checkOut = () =>{
    product.value.slug = props.product_detail?.data?.product_slug
    const valid = subValidation()
    if (valid){
        if(!!user.value?.props?.auth?.user){
            disable.value.show = true
            axios
                .post('/add-order', product.value)
                .then((response)=>{
                    if(response.data.success){
                        Toast.fire({icon: "success", title: "Product Added to Cart!"})
                        disable.value.show = true
                    }else
                        disable.value.show = false
                })
                .catch((err)=>{
                    if(!!err.response.data.errors)
                        Toast.fire({icon: "error", title: err.response.data.message})
                    disable.value.show = false
                })
        }else
            $('#loginModal').modal('show');
    }
}

const CloseModal = () =>{
    registerForm.reset('password', 'password_confirmation')
    loginForm.reset('password')
}

const signUpModal = () =>{
    $('#loginModal').modal('hide')
    $('#registerModal').modal('show')
}

const loginModal = () =>{
    $('#registerModal').modal('hide')
    $('#loginModal').modal('show')
}

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
                                             <input @change="showSubscribeSecond()" @click="product.subscription = data?.subscription_name?.id" :checked="product.subscription === data?.subscription_name?.id" class="text-gray-600 mr-2 focus:ring-0" name="subscription" :id="'sub'+data.subscription_types_id+'scribe'" type="radio" >
                                             <label :for="'sub'+data.subscription_types_id+'scribe'">{{data?.subscription_name?.name }} subscription</label>
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
                                        Total Payment of this Subscription
                                    </div>
                                    <div class="my-4">
                                        <div class="p-2 flex items-center">
                                            $ {{ subscriptionPrice.total }}
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                            <input @click="product.type = 1" :checked="product.type === 1" name="productEnableType" class="text-gray-600 mr-2 focus:ring-0" id="enable_monthly" type="radio" >
                                            <label for="enable_monthly">Do you want to enable Monthly Installment</label>
                                        </div>
                                        <div class="w-full p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                            <input @click="product.type = 2" :checked="product.type === 2" name="productEnableType" class="text-gray-600 mr-2 focus:ring-0" id="enable_weekly" type="radio" >
                                            <label for="enable_weekly">Do you want to enable Weekly Installment</label>
                                        </div>
                                    </div>
                                    <span v-if="!!error.type" class="text-red-600 font-bold text-sm ml-2">{{error.type}}</span>
                                    <div v-if="product.type === 1" class="mt-4 p-2">
                                        You have to pay approximately $ {{ subscriptionPrice.monthly }} every month
                                    </div>
                                    <div v-else-if="product.type === 2" class="mt-4 p-2">
                                        You have to pay approximately $ {{ subscriptionPrice.weekly }} every week
                                    </div>
                                    <div v-if="product.type === 1 || product.type === 2" class="mt-4">
                                        <div class="w-full p-3 mb-4 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                                            <label for="enable_weekly">Enter Address and Personal Information</label>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.name" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Full Name" type="text" >
                                            <span v-if="!!error.name" class="text-red-600 font-bold text-sm">{{error.name}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.phone" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Phone Number" type="text" >
                                            <span v-if="!!error.phone" class="text-red-600 font-bold text-sm">{{error.phone}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.address_1" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Address Line 1" type="text" >
                                            <span v-if="!!error.address_1" class="text-red-600 font-bold text-sm">{{error.address_1}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.address_2" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Address Line 2" type="text" >
                                            <span v-if="!!error.address_2" class="text-red-600 font-bold text-sm">{{error.address_2}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.city" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="City" type="text" >
                                            <span v-if="!!error.city" class="text-red-600 font-bold text-sm">{{error.city}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.state" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="State" type="text" >
                                            <span v-if="!!error.state" class="text-red-600 font-bold text-sm">{{error.state}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.zipcode" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Zipcode" type="text" >
                                            <span v-if="!!error.zipcode" class="text-red-600 font-bold text-sm">{{error.zipcode}}</span>
                                        </div>
                                        <div class="mx-auto md:w-1/2">
                                            <input v-model="product.country" class="text-white rounded flex w-full justify-center mx-auto mt-2 bg-gray-600 placeholder:text-gray-100 focus:ring-0"  placeholder="Country" type="text" >
                                            <span v-if="!!error.country" class="text-red-600 font-bold text-sm">{{error.country}}</span>
                                        </div>
                                    </div>
                                    <div class="p-5 flex justify-center">
                                        <button @click="checkOut()" :disabled="disable.show" :class="{'!opacity-50 !hover:border-violet-600 hover:bg-violet-600':disable.show}" type="button" class="px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                                             Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </UserLayout>
    </div>
    <modal-dialog ModalId="stripeModal" @CloseModal="CloseModal">
        <div class="mx-auto">
            stripe modal contant
        </div>
        <div class="p-5 flex justify-center">
            <button @click="checkOutModal()" :disabled="disable.show" :class="{'!opacity-50 !hover:border-violet-600 hover:bg-violet-600':disable.show}" type="button" class="px-4 py-2 rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white">
                Checkout
            </button>
        </div>
    </modal-dialog>
    <modal-dialog ModalId="loginModal" @CloseModal="CloseModal">
        <div class="mx-auto">
            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <form @submit.prevent="submitLogin">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="loginForm.email" required autofocus autocomplete="username" />
                    <InputError class="mt-2" :message="loginForm.errors.email" />
                </div>
                <div class="mt-3">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="loginForm.password" required autocomplete="current-password" />
                    <InputError class="mt-2" :message="loginForm.errors.password" />
                </div>
                <div class="mt-4 flex justify-center">
                    <div @click="signUpModal()" class="text-sm pr-4 cursor-pointer text-gray-600 underline hover:text-gray-900">
                        Signup
                    </div>
                </div>
                <div class="mt-6">
                    <PrimaryButton class="w-full" :class="{ 'opacity-25': loginForm.processing }" :disabled="loginForm.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </modal-dialog>
    <modal-dialog ModalId="registerModal" @CloseModal="CloseModal">
        <div class="mx-auto">
            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <form @submit.prevent="submitRegister">
                <div>
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="registerForm.name" required autofocus autocomplete="name" />
                    <InputError class="mt-2" :message="registerForm.errors.name" />
                </div>
                <div class="mt-3">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="registerForm.email" required autocomplete="username" />
                    <InputError class="mt-2" :message="registerForm.errors.email" />
                </div>
                <div class="mt-3">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="registerForm.password" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="registerForm.errors.password" />
                </div>
                <div class="mt-3">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="registerForm.password_confirmation" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="registerForm.errors.password_confirmation" />
                </div>
                <div class="mt-4 flex flex-col items-end">
                    <PrimaryButton class="w-full" :class="{ 'opacity-25': registerForm.processing }" :disabled="registerForm.processing">
                        Register
                    </PrimaryButton>
                    <div @click="loginModal()" class="text-sm cursor-pointer text-gray-600 underline hover:text-gray-900">
                        Already registered?
                    </div>
                </div>
            </form>
        </div>
    </modal-dialog>
</template>
<style scoped>

</style>
