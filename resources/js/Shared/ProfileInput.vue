<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="font-monse bg-gray-200 rounded w-full text-gray-800 focus:outline-none border-b-4 border-gray-300 focus:border-yellow-400 transition duration-500 px-3 pb-3 pt-3"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
