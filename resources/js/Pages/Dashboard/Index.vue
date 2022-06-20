<template>
    <div>
        <Head title="Dashboard" />
        <h1 class="mb-8 text-3xl font-bold font-lora">Dashboard</h1>

        <p class="mb-8 leading-normal font-monse">Our web is up to date! We want to thank all the people who support the Reverse Recipe's project because today we launch <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">1.0 version</code> of our product. it's been a long road since we started developing the prototype. We started as a team of three people and now we are more than ten! We hope you feel comfortable using our website and that it is useful for you to find the recipes that best suit your lifestyle.</p>

        <p class="mb-8 leading-normal font-monse">The improvements included in this final version have been: a new way of searching for ingredients, focused on accessibility, better memory management, the possibility of saving recipes in favorites for later consultation and the option of fully managing your user profile. these improvements have focused on improving <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">usability</code> and in creating a better experience for the use of the web. With these features we intend that our users feel comfortable using our application for a longer time.</p>

        <p class="mb-8 leading-normal font-monse">Reverse recipes is a project developed by <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">three engineers</code>, so the business model is based on a SaaS (Software as a Service). In section <Link :href="route('about')" class="text-white block mt-4 md:inline-block md:mt-0 hover:text-gray-300 duration-300">About</Link> you can know in detail the advantages of supporting this project. Feel free if you want to donate some money to the improvement of the project, being able to do it through Paypal or in our Bitcoin wallet that appears in the section of my profile. </p>

        <p class="mb-8 leading-normal font-monse">In the coming months we plan to launch the native mobile version of our application, which will also allow you to share recipes with all your friends and be able to see the opinions of other users about <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">each recipe.</code> There is also the possibility of exporting your recipes to pdf, to be able to print them and take notes on them or simply have them saved to read them later.</p>

        <p class="mb-8 leading-normal font-monse">We hope you enjoy all of this as much as we did creating it. We're currently building a great team of developers and we wouldn't mind if you sent us your <code class="bg-yellow-400 px-1 py-0.5 rounded text-yellow-700 font-mono italic">resume.</code> The requirements are not very high, but we would like someone who has experience in Laravel, Vue and Tailwind. It would also be advisable to know something about design patterns and agile development, but this is something you can learn on a day-to-day basis.</p>

        <p class="mb-8 leading-normal font-monse">The Reverse Recipe's Team</p>

        <img src="/logo.png" alt="Reverse recipes logo" class="h-20 w-20 m-auto">

        <div class="border-t mt-6"></div>

        <div class="text-center p-4">Reverse Recipes - 2022</div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Shared/AppLayout';

export default {
    components: {
        Head,
        Link
    },
    layout: AppLayout,
}
</script>
