<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="text-[25px] my-2">Products</div>
        <div class="flex flex-col overflow-x-auto">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead>
                                <tr class="border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        #No
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Product Name
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Product Description
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Product Price
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Status
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Category
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        SubCategory
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Style
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Material
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Tier Level
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Safety Resistance
                                    </th>
                                    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product,key) in products?.data" :key="product?.id" class="text-gray-700">

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ key+1 }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.product_name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.description }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.product_price }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ statusProduct(product?.status) }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.sub_category_name?.category_data?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.sub_category_name?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.style_name?.name}}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.material_name?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.tier_name?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ product?.safety_name?.name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center space-x-2 text-white mx-auto">
                                        <div @click="editProduct(product?.product_slug)" class="py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer">Edit</div>
                                        <div @click="deleteProduct(product?.id)" class="py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer">Delete</div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                            <pagination :links="products?.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const props = defineProps({
    products: Object
})

const errors = ref([]),
    disable = ref(false)

const statusProduct = (status) =>{
    if(!!status && status === 1)
        return 'hide'
    else
        return 'show'
}

const editProduct = (slug) =>{
    console.log('/products/edit/'+slug)
    router.visit('/products/edit/'+slug)
}


const deleteProduct = (id) =>{
    if (!!id){
        ConfirmToast.fire({}).then((confirmed) => {
            if (confirmed.isConfirmed === true) {
                axios
                    .delete('/delete-product/'+id)
                    .then((response) => {
                        if(response.data.success) {
                            Toast.fire({icon: "success", title: "Product Deleted!"})
                            router.visit('/products')
                        }
                    })
            }
        })
    }
}

onMounted(()=>{
    console.log(props.products.data)
})
</script>
