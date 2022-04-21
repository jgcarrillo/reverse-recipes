<template>
    <div class="flex items-center">
        <div class="flex w-full bg-white rounded shadow">
            <input class="relative px-6 py-3 w-full rounded font-monse bg-gray-200 text-gray-800 border-gray-300 border-b-4 focus:border-yellow-400 focus:outline-none" autocomplete="off" type="text" name="search" placeholder="Search…" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        </div>
        <button class="ml-3 text-indigo-300 hover:text-white text-sm" type="button" @click="$emit('reset')">Reset</button>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: String,
        maxWidth: {
            type: Number,
            default: 300,
        },
    },
    emits: ['update:modelValue', 'reset'],
}
</script>
