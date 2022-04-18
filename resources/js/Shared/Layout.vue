<template>
    <the-navbar></the-navbar>

    <slot name="default"></slot>

    <the-footer></the-footer>

</template>

<script>
import { defineComponent } from 'vue';
import TheNavbar from "@/Shared/TheNavbar";
import TheFooter from "@/Shared/TheFooter";

export default defineComponent({
    components: {
        TheNavbar,
        TheFooter
    }
});
</script>

<style></style>
