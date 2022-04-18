<template>
    <the-navbar></the-navbar>

    <slot name="default"></slot>

    <the-footer></the-footer>

</template>

<script>
import { defineComponent } from 'vue';
import TheNavbar from "./TheNavbar";
import TheFooter from "./TheFooter";

export default defineComponent({
    components: {
        TheNavbar,
        TheFooter
    }
});
</script>

<style></style>
