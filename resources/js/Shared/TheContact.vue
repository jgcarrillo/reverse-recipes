<template>
    <div class="container mx-auto">
        <div class="p-8 rounded-lg max-w-4xl mx-auto">
            <div class="text-center">
                <h1 class="font-lora text-4xl md:text-5xl text-gray-800 font-bold">Contact</h1>
            </div>
            <form @submit.prevent="store">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input v-model="form.name" :error="form.errors.name" class="pr-6 w-full lg:w-1/2" aria-label="Your Name" label="Name" placeholder="Your Name" />
                    <text-input v-model="form.email" :error="form.errors.email" class="pr-6 w-full lg:w-1/2" aria-label="Your Email" label="Email" placeholder="Your Email" />
                    <text-input v-model="form.subject" :error="form.errors.subject" class="pr-6 w-full lg:w-1/2" aria-label="Your Subject" label="Subject" placeholder="Your Subject" />
                    <text-input v-model="form.message" :error="form.errors.message" class="pr-6 w-full lg:w-1/2" aria-label="Your Message" label="Message" placeholder="Your Message" />
                </div>

                <loading-button :loading="form.processing" aria-label="Send Message" class="px-4 mt-8 w-full justify-center py-2 rounded text-black bg-yellow-400 hover:bg-yellow-300 transition duration-500" type="submit">Send</loading-button>
            </form>
        </div>
    </div>
</template>

<script>
import TextInput from '@/Shared/TextInput.vue';
import LoadingButton from '@/Shared/LoadingButton.vue';

export default {
    remember: 'form',
    components: {
        TextInput,
        LoadingButton
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                subject: '',
                message: '',
            }),
        }
    },
    methods: {
        store() {
            this.form.post('/send-contact');
        },
    },
}
</script>

<style></style>
