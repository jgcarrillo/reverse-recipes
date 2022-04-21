<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-yellow-400 rounded-md font-semibold text-xs text-black font-monse uppercase tracking-widest hover:bg-yellow-300 focus:outline-none transition duration-500">
        <slot />
    </button>
</template>
