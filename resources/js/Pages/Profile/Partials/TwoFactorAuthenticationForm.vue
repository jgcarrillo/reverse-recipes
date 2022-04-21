<script setup>
import { ref, computed, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import CustomActionSection from '@/Shared/CustomActionSection.vue';
import ProfileButton from '@/Shared/ProfileButton.vue';
import CustomConfirmsPassword from '@/Shared/CustomConfirmsPassword.vue';
import JetDangerButton from '@/Jetstream/DangerButton.vue';
import ProfileInput from '@/Shared/ProfileInput.vue';
import CustomInputError from '@/Shared/CustomInputError.vue';
import CustomLabel from '@/Shared/CustomLabel.vue';
import SecondaryProfileButton from '@/Shared/SecondaryProfileButton.vue';

const props = defineProps({
    requiresConfirmation: Boolean,
});

const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const setupKey = ref(null);
const recoveryCodes = ref([]);

const confirmationForm = useForm({
    code: '',
});

const twoFactorEnabled = computed(
    () => ! enabling.value && usePage().props.value.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (! twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    Inertia.post('/user/two-factor-authentication', {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
            showQrCode(),
            showSetupKey(),
            showRecoveryCodes(),
        ]),
        onFinish: () => {
            enabling.value = false;
            confirming.value = props.requiresConfirmation;
        },
    });
};

const showQrCode = () => {
    return axios.get('/user/two-factor-qr-code').then(response => {
        qrCode.value = response.data.svg;
    });
};

const showSetupKey = () => {
    return axios.get('/user/two-factor-secret-key').then(response => {
        setupKey.value = response.data.secretKey;
    });
}

const showRecoveryCodes = () => {
    return axios.get('/user/two-factor-recovery-codes').then(response => {
        recoveryCodes.value = response.data;
    });
};

const confirmTwoFactorAuthentication = () => {
    confirmationForm.post('/user/confirmed-two-factor-authentication', {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
    });
};

const regenerateRecoveryCodes = () => {
    axios
        .post('/user/two-factor-recovery-codes')
        .then(() => showRecoveryCodes());
};

const disableTwoFactorAuthentication = () => {
    disabling.value = true;

    Inertia.delete('/user/two-factor-authentication', {
        preserveScroll: true,
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        },
    });
};
</script>

<template>
    <custom-action-section>
        <template #title>
            <span class="text-white font-lora">Two Factor Authentication</span>
        </template>

        <template #description>
            <span class="text-white font-monse">Add additional security to your account using two factor authentication.</span>
        </template>

        <template #content>
            <h3 v-if="twoFactorEnabled && ! confirming" class="text-lg font-medium text-white font-lora">
                You have enabled two factor authentication.
            </h3>

            <h3 v-else-if="twoFactorEnabled && confirming" class="text-lg font-medium text-white font-monse">
                Finish enabling two factor authentication.
            </h3>

            <h3 v-else class="text-lg font-medium text-white font-lora">
                You have not enabled two factor authentication.
            </h3>

            <div class="mt-3 max-w-xl text-sm text-white font-monse">
                <p>
                    When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm text-white font-monse">
                        <p v-if="confirming" class="font-semibold">
                            To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code.
                        </p>

                        <p v-else>
                            Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key.
                        </p>
                    </div>

                    <div class="mt-4" v-html="qrCode" />

                    <div class="mt-4 max-w-xl text-sm text-white font-monse" v-if="setupKey">
                        <p class="font-semibold">
                            Setup Key: <span v-html="setupKey"></span>
                        </p>
                    </div>

                    <div v-if="confirming" class="mt-4">
                        <custom-label for="code" value="Code" />

                        <profile-input
                            id="code"
                            v-model="confirmationForm.code"
                            type="text"
                            name="code"
                            class="block mt-1 w-1/2"
                            inputmode="numeric"
                            autofocus
                            autocomplete="one-time-code"
                            @keyup.enter="confirmTwoFactorAuthentication"
                        />

                        <custom-input-error :message="confirmationForm.errors.code" class="mt-2" />
                    </div>
                </div>

                <div v-if="recoveryCodes.length > 0 && ! confirming">
                    <div class="mt-4 max-w-xl text-sm text-white font-monse">
                        <p class="font-semibold">
                            Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                        </p>
                    </div>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="! twoFactorEnabled">
                    <custom-confirms-password @confirmed="enableTwoFactorAuthentication">
                        <profile-button type="button" :class="{ 'opacity-25': enabling }" :disabled="enabling">
                            Enable
                        </profile-button>
                    </custom-confirms-password>
                </div>

                <div v-else>
                    <custom-confirms-password @confirmed="confirmTwoFactorAuthentication">
                        <profile-button
                            v-if="confirming"
                            type="button"
                            class="mr-3"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            Confirm
                        </profile-button>
                    </custom-confirms-password>

                    <custom-confirms-password @confirmed="regenerateRecoveryCodes">
                        <secondary-profile-button
                            v-if="recoveryCodes.length > 0 && ! confirming"
                            class="mr-3"
                        >
                            Regenerate Recovery Codes
                        </secondary-profile-button>
                    </custom-confirms-password>

                    <custom-confirms-password @confirmed="showRecoveryCodes">
                        <secondary-profile-button
                            v-if="recoveryCodes.length === 0 && ! confirming"
                            class="mr-3"
                        >
                            Show Recovery Codes
                        </secondary-profile-button>
                    </custom-confirms-password>

                    <custom-confirms-password @confirmed="disableTwoFactorAuthentication">
                        <secondary-profile-button
                            v-if="confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Cancel
                        </secondary-profile-button>
                    </custom-confirms-password>

                    <custom-confirms-password @confirmed="disableTwoFactorAuthentication">
                        <JetDangerButton
                            v-if="! confirming"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Disable
                        </JetDangerButton>
                    </custom-confirms-password>
                </div>
            </div>
        </template>
    </custom-action-section>
</template>
