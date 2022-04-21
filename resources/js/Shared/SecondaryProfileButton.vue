<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-white font-monse uppercase tracking-widest shadow-sm hover:bg-white hover:text-black focus:outline-none transition duration-500">
        <slot />
    </button>
</template>
