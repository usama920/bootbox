<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-between py-2">
            <div class="text-[25px]">Weekly Margin of Subscription</div>
        </div>
        <div class="flex flex-col overflow-x-auto">
            <div class="space-y-2 p-4 text-lg">
                <label>Weekly Margin:</label>
                <span class="text-red-500 ml-2 text-xs font-bold" v-if="!!errors">{{errors}}</span>
                <input v-model="price.margin_amount" type="number" class="w-full rounded" autocomplete="off" placeholder="Amount">
                <div class="flex justify-end p-4">
                    <button @click="editMargin()" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const price = ref({margin_amount:''}),
    errors = ref(),
    disable = ref(false)

const editMargin = () =>{
    if (!!price.value.margin_amount) {
        axios
            .post('/weekly-margin', price.value)
            .then((response) => {
                if (response.data.success) {
                    Toast.fire({icon: "success", title: "Saved!"})
                }
            })
    }else
        errors.value = 'Field is Required'
}

const margins = () =>{
    axios
        .get('/weekly-margin')
        .then((response)=>{
            if(response.data.success){
                price.value.margin_amount=response?.data?.data?.margin_amount
            }
        })
}

onMounted(()=>{
    margins()
})
</script>
