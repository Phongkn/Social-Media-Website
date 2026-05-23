<script setup>
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.clearErrors();
    form.reset();
};
</script>

<template>
    <section>
        <header class="mb-6">
            <h2 class="text-xl font-bold text-[#050505]">
                Vô hiệu hóa và xóa
            </h2>
        </header>

        <div class="rounded-lg border border-[#dadde1] p-4">
            <div class="flex items-start gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#ffebee]">
                    <svg class="h-5 w-5 text-[#e74c3c]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-[#050505]">Xóa tài khoản vĩnh viễn</h3>
                    <p class="mt-1 text-sm text-[#65676b]">
                        Khi xóa tài khoản, tất cả dữ liệu của bạn sẽ bị xóa vĩnh viễn và không thể khôi phục.
                    </p>
                    <button
                        @click="confirmUserDeletion"
                        class="mt-3 rounded-lg border border-[#e74c3c] px-4 py-2 text-sm font-semibold text-[#e74c3c] hover:bg-[#ffebee]"
                    >
                        Xóa tài khoản
                    </button>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <teleport to="body">
            <div
                v-if="confirmingUserDeletion"
                class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50"
                @click.self="closeModal"
            >
                <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
                    <h2 class="text-xl font-bold text-[#050505]">
                        Bạn có chắc chắn muốn xóa tài khoản?
                    </h2>

                    <p class="mt-2 text-sm text-[#65676b]">
                        Khi xóa tài khoản, tất cả dữ liệu của bạn sẽ bị xóa vĩnh viễn và không thể khôi phục.
                        Vui lòng nhập mật khẩu để xác nhận.
                    </p>

                    <div class="mt-4">
                        <input
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="w-full rounded-lg border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#050505] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                            placeholder="Nhập mật khẩu"
                            @keyup.enter="deleteUser"
                        />
                        <InputError :message="form.errors.password" class="mt-1" />
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button
                            @click="closeModal"
                            class="rounded-lg bg-[#e4e6eb] px-4 py-2.5 text-sm font-semibold text-[#050505] hover:bg-[#d8dadf]"
                        >
                            Hủy
                        </button>
                        <button
                            @click="deleteUser"
                            class="rounded-lg bg-[#e74c3c] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#c0392b] disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            Xóa tài khoản
                        </button>
                    </div>
                </div>
            </div>
        </teleport>
    </section>
</template>
