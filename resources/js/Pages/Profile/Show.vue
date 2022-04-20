<script>
import {Head} from "@inertiajs/inertia-vue3";
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import AppLayout from '@/Shared/AppLayout';

export default {
    components: {
        Head,
        UpdateProfileInformationForm,
        JetSectionBorder,
        DeleteUserForm,
        LogoutOtherBrowserSessionsForm,
        TwoFactorAuthenticationForm,
        UpdatePasswordForm
    },
    props: {
        confirmsTwoFactorAuthentication: Boolean,
        sessions: Array,
    },
    layout: AppLayout,
}
</script>

<template>
    <Head title="My profile" />
    <h1 class="mb-8 text-3xl font-bold font-lora">My profile</h1>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                <UpdateProfileInformationForm :user="$page.props.user" />

                <JetSectionBorder />
            </div>

            <div v-if="$page.props.jetstream.canUpdatePassword">
                <UpdatePasswordForm class="mt-10 sm:mt-0" />

                <JetSectionBorder />
            </div>

            <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                <TwoFactorAuthenticationForm
                    :requires-confirmation="confirmsTwoFactorAuthentication"
                    class="mt-10 sm:mt-0"
                />

                <JetSectionBorder />
            </div>

            <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

            <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                <JetSectionBorder />

                <DeleteUserForm class="mt-10 sm:mt-0" />
            </template>
        </div>
    </div>
</template>
