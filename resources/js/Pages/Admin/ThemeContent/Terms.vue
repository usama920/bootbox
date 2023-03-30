<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <div class="flex justify-between px-4 pb-2">
            <div class="text-[25px]">Terms Page Content</div>
        </div>
        <form class="px-4 text-lg">
            <div class="border-gray-400 rounded p-4 bg-white border-2">
                <div>
                    <label class="font-normal text-base">Introduction:</label>
                    <textarea v-model="terms.intro" rows="4" class="w-full rounded"></textarea>
                    <label class="font-normal text-base">Agreement:</label>
                    <textarea v-model="terms.agreement" rows="10" class="w-full rounded"></textarea>
                </div>
            </div>
            <div class="flex justify-end p-4">
                <button @click="termsSave()" :class="{'opacity-50': disable}" :disabled="disable" class="px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Submit</button>
            </div>
        </form>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const terms = ref({agreement:'', intro:''}),
    disable = ref(false)

const termsSave = () =>{
    disable.value = true
    axios
        .post('/save-terms', terms.value)
        .then((response)=>{
            if(response.data.success){
                Toast.fire({icon: "success", title: "Information Saved!"})
                showTerms()
            }
        }).finally(()=>{
        disable.value = false
    })
}

const showTerms = () =>{
    axios
        .get('/save-terms')
        .then((response)=>{
            terms.value = !!response.data.data ? response.data.data: {agreement:'', intro:''}
        })
}
onMounted(()=>{
    showTerms()
})
</script>
