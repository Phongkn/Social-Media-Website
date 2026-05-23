<script setup>
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header class="mb-6">
            <h2 class="text-xl font-bold text-[#050505]">
                Đổi mật khẩu
            </h2>
            <p class="mt-1 text-sm text-[#65676b]">
                Đảm bảo tài khoản của bạn sử dụng mật khẩu dài, ngẫu nhiên để giữ an toàn.
            </p>
        </header>

        <form @submit.prevent="updatePassword">
            <!-- Current Password -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#050505] mb-1">Mật khẩu hiện tại</label>
                <input
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                    autocomplete="current-password"
                />
                <InputError :message="form.errors.current_password" class="mt-1" />
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#050505] mb-1">Mật khẩu mới</label>
                <input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-[#050505] mb-1">Xác nhận mật khẩu mới</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password_confirmation" class="mt-1" />
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-3 border-t border-[#ced0d4] pt-4 mt-6">
                <button
                    type="submit"
                    class="rounded-lg bg-[#1877f2] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#166fe5] disabled:opacity-50"
                    :disabled="form.processing"
                >
                    Lưu mật khẩu
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
