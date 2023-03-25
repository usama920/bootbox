<template>
    <Head title="Log in" />
    <UserLayout>
        <div class="max-w-lg mx-auto flex-1 my-40">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="Verification" value="Verification code" />
                    <TextInput id="Verification" type="text" class="mt-1 block w-full" v-model="code" />
                </div>
                <div class="mt-6">
                    <PrimaryButton class="w-full" :class="{ 'opacity-25':processing }" :disabled="processing">
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </UserLayout>
</template>

<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, router} from '@inertiajs/vue3';
import {ref} from "vue";
import commonFunctions from "@/use/common";

const { Toast, ConfirmToast } = commonFunctions()

const code = ref(''),
    processing = ref(false)

const submit = () => {
    if (!!code.value && code.value.length === 6) {
        processing.value = true
        axios
            .post('/account-verify', {'code': code.value})
            .then((response) => {
                if(response.data.success){
                    Toast.fire({icon: "Success", title: "Email Verified"})
                    router.visit('/')
                }
            })
            .finally(()=>{
                processing.value = false
            })
            .catch((err)=>{
                console.log(err.response.data.error)

                if(!!err.response.data.error){
                    Toast.fire({icon: "error", title: err.response.data.error})
                    router.visit('/register')
                }
            })
    }else{
        processing.value = false
        Toast.fire({icon: "error", title: "Six digits Verification code required"})
    }
};
</script>


