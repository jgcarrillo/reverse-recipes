<template>
    <Head title="Error" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600 text-center font-lora">
            <h1 class="text-3xl">{{ title }}</h1>
            <h3 class="text-xl font-monse mt-4">{{ description }}</h3>
        </div>

        <div class="mb-4 text-sm text-gray-600 text-center font-lora">
            <Link :href="route('home')" class="text-center mt-4 underline text-sm text-gray-600 hover:text-gray-900">Home
            </Link>
        </div>
    </JetAuthenticationCard>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';

export default {
    props: {
        status: Number,
    },
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        Link
    },
    computed: {
        title() {
            return {
                503: '503: Service Unavailable',
                500: '500: Server Error',
                404: '404: Page Not Found',
                403: '403: Forbidden',
            }[this.status]
        },
        description() {
            return {
                503: 'Sorry, we are doing some maintenance. Please check back soon.',
                500: 'Whoops, something went wrong on our servers.',
                404: 'Sorry, the page you are looking for could not be found.',
                403: 'Sorry, you are forbidden from accessing this page.',
            }[this.status]
        },
    },
}
</script>
