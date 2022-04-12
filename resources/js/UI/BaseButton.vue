<template>
    <button :type="type" class="bg-yellow-400 hover:bg-yellow-300 font-bold py-2 rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-500 uppercase">
        <slot></slot>
    </button>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
})
</script>
