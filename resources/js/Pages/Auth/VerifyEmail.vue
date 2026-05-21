<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Xác minh email" />

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác minh
            địa chỉ email của mình bằng cách nhấp vào liên kết chúng tôi vừa gửi cho bạn không?
            Nếu bạn không nhận được email, chúng tôi sẽ gửi lại cho bạn.
        </div>

        <div
            class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"
            v-if="verificationLinkSent"
        >
            Liên kết xác minh mới đã được gửi đến địa chỉ email bạn đã cung cấp
            trong quá trình đăng ký.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Gửi lại email xác minh
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    >Đăng xuất</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
