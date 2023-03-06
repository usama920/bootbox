<script setup>
    import UserHeader from '/resources/js/Components/UserHeader.vue';
    import UserFooter from '/resources/js/Components/UserFooter.vue';
</script>
<template>
    <user-header />
    <slot />
    <user-footer />
</template>


