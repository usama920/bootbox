<script setup>

const props = defineProps({
    ModalId: {
        type: String,
        default: '',
    },
    maxWidth: {
        type: String,
        default: '',
    }
});

const emit = defineEmits(['CloseModal']);

</script>
<template>
    <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" :id="ModalId" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref  :class="maxWidth" class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div :class="maxWidth" class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-gradient-to-tl from-red-600 to-violet-600 bg-clip-padding opacity-100 text-current shadow-lg outline-none">
                <!-- <span class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/40 to-violet-600/40"></span> -->
                <div class="flex flex-shrink-0 items-center justify-end rounded-t-md pr-4 pt-4">
                    <button @click="$emit('CloseModal')" type="button" class="box-content rounded-none !text-gray-700 border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div data-te-modal-body-ref class="relative pb-4 px-4">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
