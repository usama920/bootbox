<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Product Detail</div>
        </div>
        <form class="space-y-2 px-4 text-lg">
            <div>
                <label class="font-bold">Product Stripe Id:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.product_stripe_id}}</span>
                <input v-model="productInfo.product_stripe_id" type="text" class="w-full rounded" autocomplete="off" placeholder="Product Stripe ID">
            </div>
            <div>
                <label class="font-bold">Product Title:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.name}}</span>
                <input v-model="productInfo.name" type="text" class="w-full rounded" autocomplete="off" placeholder="Name">
            </div>
            <div>
                <label class="font-bold">Description:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.description}}</span>
                <textarea v-model="productInfo.description" type="text" class="w-full rounded" rows="5" autocomplete="off" placeholder="About Product"></textarea>
            </div>
            <div>
                <label class="font-bold">Full Price:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.price}}</span>
                <input v-model="productInfo.price" type="number" class="w-full rounded" autocomplete="off" placeholder="One Time Price">
            </div>
            <div>
                <label class="font-bold">Full Price Stripe ID:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.full_price_strip_id}}</span>
                <input v-model="productInfo.full_price_strip_id" type="text" class="w-full rounded" autocomplete="off" placeholder="One time Strip Price ID">
            </div>
            <div>
                <label class="font-bold">Pictures:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.image}}</span>
                <input @change="images($event)" type="file" multiple class="w-full border-gray-500 bg-white p-1 border rounded">
                <div v-if="!!productInfo.previous_img && productInfo.previous_img?.length>0" data-te-toggle="modal" data-te-target="#previewImages" class="font-bold cursor-pointer text-blue-600">Preview</div>
            </div>
            <div>
                <label class="font-bold">Product Status:</label>
                <div class="text-[14px] w-full border-gray-500 bg-white p-1.5 border rounded flex items-center space-x-4">
                    <div class="flex items-center space-x-1">
                        <input :checked="productInfo.status !== 1" @change="productStatus(0)" type="radio" id="one" name="status" class="" >
                        <label>Show</label>
                    </div>
                    <div class="flex items-center space-x-1">
                        <input :checked="productInfo.status === 1" @change="productStatus(1)" type="radio" id="two" name="status" class="" >
                        <label>Hide</label>
                    </div>
                </div>
            </div>
            <div>
                <label class="font-bold">SubCategory:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.subCategory}}</span>
                <select v-model="productInfo.subCategory" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.subCategory" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div>
                <label class="font-bold">Style:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.style}}</span>
                <select v-model="productInfo.style" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.style" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div>
                <label class="font-bold">Tier Level:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.tier}}</span>
                <select v-model="productInfo.tier" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.tier" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div>
                <label class="font-bold">Safety:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.safety}}</span>
                <select v-model="productInfo.safety" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.safety" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div>
                <label class="font-bold">Material:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.material}}</span>
                <select v-model="productInfo.material" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.material" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div>
                <label class="font-bold">Gender:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.gender}}</span>
                <select v-model="productInfo.gender" class="w-full border-gray-500 bg-white p-[9px] border rounded">
                    <option value="0" disabled>select option</option>
                    <option v-for="data in options.gender" :value="data?.id">{{data?.name}}</option>
                </select>
            </div>
            <div class="">
                <label class="font-bold">Available Sizes:</label>
                <div v-for="data in options.size" class="flex items-center my-2">
                    <input v-model="productInfo.size[data.id]" :checked="productInfo.size[data.id] === true" type="checkbox" :id="'size'+data?.id+'boots'" class="rounded mr-1" :value="data?.id">
                    <label :for="'size'+data?.id+'boots'">{{data?.name}}</label>
                </div>
            </div>
            <div class="">
                <label class="font-bold">Available Subscriptions:</label>
                <div v-for="data in options.subscription" class="flex items-center my-2">
                    <input v-model="productInfo.subscription.check[data.id]" type="checkbox" :id="'sub'+data?.id+'boots'" class="rounded mr-1" :value="data?.id">
                    <label :for="'sub'+data?.id+'boots'" class="mr-4 w-40">{{data?.name}}</label>
                    <input v-model="productInfo.subscription.price[data.id]" :disabled="productInfo.subscription.check[data.id] !== true" :class="{'opacity-50 bg-gray-500':productInfo.subscription.check[data.id] !== true}" type="number" placeholder="Subscription Price" class="ml-5 w-40 rounded h-10">
                    <input v-model="productInfo.subscription.stripe_id[data.id]" :disabled="productInfo.subscription.check[data.id] !== true" :class="{'opacity-50 bg-gray-500':productInfo.subscription.check[data.id] !== true}" type="text" placeholder="Stripe Monthly Price Id" class="ml-5 w-40 rounded h-10">
                    <input v-model="productInfo.subscription.stripe_weekly_id[data.id]" :disabled="productInfo.subscription.check[data.id] !== true" :class="{'opacity-50 bg-gray-500':productInfo.subscription.check[data.id] !== true}" type="text" placeholder="Stripe Weekly Price Id" class="ml-5 w-40 rounded h-10">
                </div>
            </div>
        </form>
        <div class="flex justify-end p-4">
            <button @click="productSave(productInfo)" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
        </div>
        <modal-dialog ModalId="previewImages">
             <img v-if="!!productInfo.previous_img && productInfo.previous_img?.length>0" v-for="img in productInfo.previous_img" alt="image" :src="baseUrl+'/storage/images/products/'+img.name">
             <div v-else class="text-center font-bold">Images not Available</div>
        </modal-dialog>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import ModalDialog from '@/Components/ModalDialog.vue'
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const productInfo = ref({id:'',full_price_strip_id:'', product_stripe_id:'', previous_img:[], style:0, gender:0, size:{}, subscription:{check:{}, price:{}, stripe_id:{},  stripe_weekly_id:{} }, subCategory:0, tier:0, safety:0, material:0, name:'', description:'', price:'', status:'', images:[]}),
    baseUrl = window.location.origin,
    errors = ref([]),
    ImagesUri = ref([]),
    disable = ref(false),
    productError = ref({image:'',full_price_strip_id:'', product_stripe_id:'', style:'', size:'', subCategory:'', tier:'', safety:'', material:'', name:'', description:'', price:''}),
    options = ref({style:{}, size:{}, subscription:{}, subCategory:{}, tier:{}, gender:{}, safety:{}, material:{}})

const props = defineProps({
    product_info: Object
})

const productStatus = (status) =>{
    productInfo.value.status = !!status ? status:0
}

const images = (e) =>{
    _.forEach(e.target.files, function(value, key) {
        productInfo.value.images.push(value)
        ImagesUri.value.push(URL.createObjectURL(value))
    });
}

const emptyError = () =>{
    productError.value = {image:'', product_stripe_id:'', full_price_strip_id:'', style:'', size:'', subCategory:'', tier:'', safety:'', material:'', name:'', description:'', price:''}
}
const validationError = (post) => {
    emptyError()
    if (!post.style)
        productError.value.style = 'Style is required field'
    if (!post.subCategory)
        productError.value.subCategory = 'Sub Category is required field'
    if (!post.tier)
        productError.value.tier = 'Tier Level is required field'
    if (!post.safety)
        productError.value.safety = 'Safety is required field'
    if (post.images?.length === 0 && post.previous_img?.length === 0)
        productError.value.image = 'Images are required'
    if (!post.material)
        productError.value.material = 'Material is required field'
    if (!post.name)
        productError.value.name = 'Name is required field'
    if (!post.description)
        productError.value.description = 'Description is required field'
    if (!post.price)
        productError.value.price = 'Price is required field'
    if (!post.product_stripe_id)
        productError.value.product_stripe_id = 'Price Stripe Id is required field'
    if (!post.full_price_strip_id)
        productError.value.full_price_strip_id = 'Strip Price Id is required field'

    return !productError.value.full_price_strip_id && !productError.value.product_stripe_id && !productError.value.style && !productError.value.subCategory && !productError.value.tier && !productError.value.safety && !productError.value.image && !productError.value.material && !productError.value.name && !productError.value.description && !productError.value.price
}

const productSave = (post) =>{
    let valid = validationError (post)
    if (valid) {
        disable.value = true
        const formData = new FormData();
        for (let item in post) {
            if(post.hasOwnProperty(item)) {
                if(item === "images") {
                    let index=1
                    _.forEach(post[item], function (value, key){
                        const length = key+1
                        formData.append('image'+length ,  value);
                        index = key
                    })
                    formData.append('length',  JSON.stringify(index+1));
                }else
                    formData.append(item,  JSON.stringify(post[item]));
            }
        }
        axios
            .post('/save-product', formData , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                if(response.data.success){
                    Toast.fire({icon: "success", title: "Product Information Saved!"})
                    router.visit('/products/edit/'+response?.data?.data?.product_slug)
                }
            })
            .finally(() => disable.value = false)
    } else
        disable.value = false
}

const productDetail = () =>{
    axios
        .get('/product-options')
        .then((response)=>{
            if(!!response.data){
                options.value.style = !!response?.data?.data1 ? response?.data?.data1:{}
                options.value.size = !!response?.data?.data2 ? response?.data?.data2:{}
                options.value.material = !!response?.data?.data3 ? response?.data?.data3:{}
                options.value.subCategory = !!response?.data?.data4 ? response?.data?.data4:{}
                options.value.tier = !!response?.data?.data5 ? response?.data?.data5:{}
                options.value.safety = !!response?.data?.data6 ? response?.data?.data6:{}
                options.value.subscription = !!response?.data?.data7 ? response?.data?.data7:{}
                options.value.gender = !!response?.data?.data8 ? response?.data?.data8:{}
            }
        })
}

const productInformation = () =>{
    productInfo.value.id = props?.product_info?.id
    productInfo.value.name = !!props?.product_info?.product_name ? props?.product_info?.product_name:''
    productInfo.value.description = !!props?.product_info?.description ? props?.product_info?.description:''
    productInfo.value.price = !!props?.product_info?.product_price ? props?.product_info?.product_price:''
    productInfo.value.status = !!props?.product_info?.status ? props?.product_info?.status: 0
    productInfo.value.material = !!props?.product_info?.materials_id ? props?.product_info?.materials_id:0
    productInfo.value.subCategory = !!props?.product_info?.sub_categories_id ? props?.product_info?.sub_categories_id:0
    productInfo.value.safety = !!props?.product_info?.safety_resistances_id ? props?.product_info?.safety_resistances_id:0
    productInfo.value.tier = !!props?.product_info?.tier_levels_id ? props?.product_info?.tier_levels_id:0
    productInfo.value.style = !!props?.product_info?.styles_id ? props?.product_info?.styles_id:0
    productInfo.value.gender = !!props?.product_info?.genders_id ? props?.product_info?.genders_id:0
    productInfo.value.product_stripe_id = !!props?.product_info?.product_stripe_id ? props?.product_info?.product_stripe_id:''
    productInfo.value.full_price_strip_id = !!props?.product_info?.full_price_strip_id ? props?.product_info?.full_price_strip_id:''

    if(!!props?.product_info?.product_images)
        productInfo.value.previous_img = props?.product_info?.product_images

    if(!!props?.product_info?.product_sizes && props?.product_info?.product_sizes.length>0){
        _.forEach(props?.product_info?.product_sizes, function (value, key) {
            productInfo.value.size[value?.sizes_id] = value?.status === 1;
        });
    }
    if(!!props?.product_info?.product_subscriptions && props?.product_info?.product_subscriptions.length>0){
        _.forEach(props?.product_info?.product_subscriptions, function (value, key) {
            productInfo.value.subscription.check[value?.subscription_types_id] = value?.status === 1;
            productInfo.value.subscription.price[value?.subscription_types_id] = value?.price;
            productInfo.value.subscription.stripe_id[value?.subscription_types_id] = value?.strip_price_id;
            productInfo.value.subscription.stripe_weekly_id[value?.subscription_types_id] = value?.weekly_strip_id;
        });
    }
}

onMounted(()=>{
    productDetail()
    productInformation()
})
</script>
