<template>
    <button :type="type" class="bg-gray-700 hover:bg-gray-900 border-white hover:border-white py-3 text-sm rounded-full text-white  ">
        <slot />
    </button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
