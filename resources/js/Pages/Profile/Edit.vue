<script setup>
import SocialLayout from '@/Layouts/SocialLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = computed(() => usePage().props.auth.user);
const initials = computed(() => {
    const name = user.value?.name ?? '';
    return name
        .split(/\s+/)
        .map((w) => w[0])
        .join('')
        .slice(0, 2)
        .toUpperCase() || '?';
});

const settingsNav = [
    { name: 'Thông tin cá nhân', icon: 'profile', active: true },
    { name: 'Mật khẩu & bảo mật', icon: 'security', active: false },
    { name: 'Thông báo', icon: 'notifications', active: false },
    { name: 'Quyền riêng tư', icon: 'privacy', active: false },
    { name: 'Tùy chọn bảng tin', icon: 'feed', active: false },
];
</script>

<template>
    <Head title="Cài đặt tài khoản" />

    <SocialLayout title="Cài đặt">
        <!-- Profile Header -->
        <div class="mb-4 rounded-lg bg-white shadow-sm">
            <!-- Cover Photo -->
            <div class="relative h-[200px] rounded-t-lg bg-gradient-to-r from-blue-400 via-blue-500 to-purple-500">
                <button class="absolute bottom-4 right-4 flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-semibold text-[#050505] shadow-sm hover:bg-[#f0f2f5]">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    Chỉnh sửa ảnh bìa
                </button>
            </div>

            <!-- Profile Info -->
            <div class="relative px-6 pb-4">
                <!-- Avatar -->
                <div class="absolute -top-16 left-6">
                    <div class="relative">
                        <div class="h-[168px] w-[168px] rounded-full border-4 border-white bg-[#e4e6eb] flex items-center justify-center">
                            <span class="text-6xl font-bold text-[#65676b]">{{ initials }}</span>
                        </div>
                        <button class="absolute bottom-2 right-2 flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb] text-[#050505] hover:bg-[#d8dadf]">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Name & Info -->
                <div class="ml-[200px] pt-4">
                    <h1 class="text-3xl font-bold text-[#050505]">{{ user?.name }}</h1>
                    <p class="text-[#65676b]">1.2K bạn bè</p>
                </div>

                <!-- Action Buttons -->
                <div class="ml-[200px] mt-4 flex gap-2">
                    <button class="flex items-center gap-2 rounded-lg bg-[#1877f2] px-4 py-2 text-sm font-semibold text-white hover:bg-[#166fe5]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4"/>
                        </svg>
                        Thêm vào tin
                    </button>
                    <button class="flex items-center gap-2 rounded-lg bg-[#e4e6eb] px-4 py-2 text-sm font-semibold text-[#050505] hover:bg-[#d8dadf]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                        Chỉnh sửa trang cá nhân
                    </button>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="border-t border-[#ced0d4] px-6">
                <div class="flex gap-1">
                    <button class="border-b-[3px] border-[#1877f2] px-4 py-4 text-sm font-semibold text-[#1877f2]">
                        Bài viết
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Giới thiệu
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Bạn bè
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Ảnh
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Video
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Check in
                    </button>
                    <button class="px-4 py-4 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5] rounded-lg">
                        Xem thêm
                    </button>
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="grid gap-4 lg:grid-cols-[360px_1fr]">
            <!-- Settings Sidebar -->
            <div class="rounded-lg bg-white p-4 shadow-sm">
                <h2 class="mb-4 text-xl font-bold text-[#050505]">Cài đặt</h2>
                <nav class="space-y-1">
                    <button
                        v-for="item in settingsNav"
                        :key="item.name"
                        class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-sm font-semibold transition"
                        :class="item.active ? 'bg-[#e7f3ff] text-[#1877f2]' : 'text-[#050505] hover:bg-[#f0f2f5]'"
                    >
                        <div class="flex h-9 w-9 items-center justify-center rounded-full"
                            :class="item.active ? 'bg-[#1877f2]' : 'bg-[#e4e6eb]'"
                        >
                            <svg v-if="item.icon === 'profile'" class="h-5 w-5" :class="item.active ? 'text-white' : 'text-[#050505]'" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'security'" class="h-5 w-5" :class="item.active ? 'text-white' : 'text-[#050505]'" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'notifications'" class="h-5 w-5" :class="item.active ? 'text-white' : 'text-[#050505]'" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'privacy'" class="h-5 w-5" :class="item.active ? 'text-white' : 'text-[#050505]'" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'feed'" class="h-5 w-5" :class="item.active ? 'text-white' : 'text-[#050505]'" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H8V4h12v12z"/>
                            </svg>
                        </div>
                        {{ item.name }}
                    </button>
                </nav>
            </div>

            <!-- Settings Forms -->
            <div class="space-y-4">
                <!-- Profile Information -->
                <div class="rounded-lg bg-white p-6 shadow-sm">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />
                </div>

                <!-- Password -->
                <div class="rounded-lg bg-white p-6 shadow-sm">
                    <UpdatePasswordForm />
                </div>

                <!-- Delete Account -->
                <div class="rounded-lg bg-white p-6 shadow-sm">
                    <DeleteUserForm />
                </div>
            </div>
        </div>
    </SocialLayout>
</template>
