<script setup>
import InputError from '@/Components/InputError.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>
        <header class="mb-6">
            <h2 class="text-xl font-bold text-[#050505]">
                Thông tin cá nhân
            </h2>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))">
            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#050505] mb-1">Họ và tên</label>
                <input
                    id="name"
                    type="text"
                    v-model="form.name"
                    class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-1" :message="form.errors.name" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#050505] mb-1">Email</label>
                <input
                    id="email"
                    type="email"
                    v-model="form.email"
                    class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-1" :message="form.errors.email" />
            </div>

            <!-- Email Verification -->
            <div v-if="mustVerifyEmail && user.email_verified_at === null" class="mb-4 rounded-lg bg-[#fff8e1] p-4">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 text-[#f7931e] mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-[#050505]">Email chưa được xác minh</p>
                        <p class="text-sm text-[#65676b]">
                            Địa chỉ email của bạn chưa được xác minh.
                            <Link
                                :href="route('verification.send')"
                                method="post"
                                as="button"
                                class="font-semibold text-[#1877f2] hover:underline"
                            >
                                Gửi lại email xác minh
                            </Link>
                        </p>
                    </div>
                </div>
                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 rounded-lg bg-[#e8f5e9] p-3 text-sm font-medium text-[#2e7d32]"
                >
                    Liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-3 border-t border-[#ced0d4] pt-4 mt-6">
                <button
                    type="submit"
                    class="rounded-lg bg-[#1877f2] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#166fe5] disabled:opacity-50"
                    :disabled="form.processing"
                >
                    Lưu thay đổi
                </button>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm font-medium text-[#2e7d32]"
                    >
                        Đã lưu thành công!
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
