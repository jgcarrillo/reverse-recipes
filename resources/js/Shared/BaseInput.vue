<template>
    <input class="font-monse bg-gray-200 rounded w-full text-gray-800 focus:outline-none border-b-4 border-gray-300 focus:border-yellow-400 transition duration-500 px-3 pb-3" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
})
</script>
