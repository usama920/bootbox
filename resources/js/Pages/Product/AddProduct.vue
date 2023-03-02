<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Product Detail</div>
        </div>
        <form class="space-y-2 px-4 text-lg">
            <div>
                <label class="font-bold">Product Name:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.name}}</span>
                <input v-model="productInfo.name" type="text" class="w-full rounded" autocomplete="off" placeholder="Name">
            </div>
            <div>
                <label class="font-bold">Description:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.description}}</span>
                <textarea v-model="productInfo.description" type="text" class="w-full rounded" rows="5" autocomplete="off" placeholder="About Product"></textarea>
            </div>
            <div>
                <label class="font-bold">Price:</label>
                <span class="text-red-500 ml-2 text-sm font-bold" >{{productError?.price}}</span>
                <input v-model="productInfo.price" type="number" class="w-full rounded" autocomplete="off" placeholder="Price">
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
            <div class="">
                <label class="font-bold">Size:</label>
                <div v-for="data in options.size">
                    <input  v-model="productInfo.size[data.id]" :checked="productInfo.size[data.id] === true" type="checkbox" :id="'size'+data?.id+'boots'" class="rounded mr-1" :value="data?.id">
                    <label :for="'size'+data?.id+'boots'">{{data?.name}}</label>
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

const productInfo = ref({id:'', previous_img:[], style:0, size:{}, subCategory:0, tier:0, safety:0, material:0, name:'', description:'', price:'', status:'', images:[]}),
    baseUrl = window.location.origin,
    errors = ref([]),
    ImagesUri = ref([]),
    disable = ref(false),
    productError = ref({image:'', style:'', size:'', subCategory:'', tier:'', safety:'', material:'', name:'', description:'', price:''}),
    options = ref({style:{}, size:{}, subCategory:{}, tier:{}, safety:{}, material:{}})

const props = defineProps({
    product_info: Object
})

const productStatus = (status) =>{
    productInfo.value.status = !!status ? status:0
}

const images = (e) =>{
    console.log(e.target.files)
    _.forEach(e.target.files, function(value, key) {
        productInfo.value.images.push(value)
        ImagesUri.value.push(URL.createObjectURL(value))
    });
}

const emptyError = () =>{
    productError.value = {image:'', style:'', size:'', subCategory:'', tier:'', safety:'', material:'', name:'', description:'', price:''}
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

    return !productError.value.style && !productError.value.subCategory && !productError.value.tier && !productError.value.safety && !productError.value.image && !productError.value.material && !productError.value.name && !productError.value.description && !productError.value.price
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
        // formData.append('image_name',  JSON.stringify(imagesPreview.value));
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
            }
        })
}

const productInformation = () =>{
    productInfo.value.id = props?.product_info?.id
    productInfo.value.name = props?.product_info?.product_name
    productInfo.value.description = props?.product_info?.description
    productInfo.value.price = props?.product_info?.product_price
    productInfo.value.status = props?.product_info?.status
    productInfo.value.material = props?.product_info?.material_name?.id
    productInfo.value.subCategory = props?.product_info?.sub_categories_id
    productInfo.value.safety = props?.product_info?.safety_name?.id
    productInfo.value.tier = props?.product_info?.tier_name?.id
    productInfo.value.style = props?.product_info?.style_name?.id
    if(!!props?.product_info?.product_images)
        productInfo.value.previous_img = props?.product_info?.product_images
    if(!!props?.product_info?.product_sizes && props?.product_info?.product_sizes.length>0){
        _.forEach(props?.product_info?.product_sizes, function (value, key) {
            productInfo.value.size[value?.sizes_id] = value?.status === 1;
        });
    }
}

onMounted(()=>{
    productDetail()
    productInformation()
})
</script>
