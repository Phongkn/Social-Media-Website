<script setup>
import { computed, ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
        default: '',
    },
});

const page = usePage();
const user = computed(() => page.props.auth.user);
const initials = computed(() => {
    const name = user.value?.name ?? '';
    return name
        .split(/\s+/)
        .map((w) => w[0])
        .join('')
        .slice(0, 2)
        .toUpperCase() || '?';
});

const showAccountMenu = ref(false);

function logout() {
    router.post(route('logout'));
}

const navMain = [
    {
        name: 'Trang chủ',
        href: () => route('dashboard'),
        routeName: 'dashboard',
        icon: 'home',
    },
    {
        name: 'Watch',
        disabled: true,
        icon: 'watch',
    },
    {
        name: 'Marketplace',
        disabled: true,
        icon: 'marketplace',
    },
    {
        name: 'Nhóm',
        disabled: true,
        icon: 'groups',
    },
    {
        name: 'Trò chơi',
        disabled: true,
        icon: 'gaming',
    },
];

const navShortcuts = [
    { name: 'Bạn bè', icon: 'friends', color: '#1877f2' },
    { name: 'Kỷ niệm', icon: 'memories', color: '#1877f2' },
    { name: 'Đã lưu', icon: 'saved', color: '#7c3aed' },
    { name: 'Trang', icon: 'pages', color: '#f7931e' },
    { name: 'Sự kiện', icon: 'events', color: '#e74c3c' },
    { name: 'Marketplace', icon: 'marketplace2', color: '#1877f2' },
    { name: 'Video', icon: 'video', color: '#1877f2' },
];

function isActive(routeName) {
    try {
        return route().current(routeName);
    } catch {
        return false;
    }
}

function handleClickOutside() {
    showAccountMenu.value = false;
}
</script>

<template>
    <div class="min-h-screen bg-[#f0f2f5]" @click="handleClickOutside">
        <!-- Top Navigation Bar -->
        <header class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="mx-auto flex h-14 max-w-[1920px] items-center justify-between px-4">
                <!-- Left: Logo + Search -->
                <div class="flex items-center gap-2">
                    <Link :href="route('dashboard')" class="flex items-center">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1877f2]">
                            <span class="text-2xl font-bold text-white">V</span>
                        </div>
                    </Link>
                    <div class="relative hidden sm:block">
                        <input
                            type="text"
                            placeholder="Tìm kiếm trên VBook"
                            class="h-10 w-60 rounded-full bg-[#f0f2f5] pl-10 pr-4 text-sm placeholder-[#65676b] focus:outline-none"
                        />
                        <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#65676b]" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 10-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 001.415-1.414l-3.85-3.85a1.007 1.007 0 00-.115-.1zM12 6.5a5.5 5.5 0 11-11 0 5.5 5.5 0 0111 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- Center: Navigation -->
                <nav class="hidden items-center gap-2 lg:flex">
                    <Link
                        v-for="item in navMain.filter(i => i.href && !i.disabled)"
                        :key="item.name"
                        :href="item.href()"
                        class="flex h-12 w-24 items-center justify-center rounded-lg transition"
                        :class="isActive(item.routeName) ? 'border-b-[3px] border-[#1877f2] text-[#1877f2]' : 'text-[#65676b] hover:bg-[#f0f2f5]'"
                    >
                        <svg v-if="item.icon === 'home'" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9.464 2.344a3 3 0 013.072 0l7 4.2A3 3 0 0121 9.2V19a3 3 0 01-3 3H6a3 3 0 01-3-3V9.2a3 3 0 011.464-2.656l7-4.2zM12 4.87a1 1 0 00-.512.138l-7 4.2A1 1 0 004 9.2V19a1 1 0 001 1h14a1 1 0 001-1V9.2a1 1 0 00-.488-.892l-7-4.2A1 1 0 0012 4.87z"/>
                        </svg>
                    </Link>
                    <div
                        v-for="item in navMain.filter(i => i.disabled)"
                        :key="item.name"
                        class="flex h-12 w-24 cursor-not-allowed items-center justify-center rounded-lg text-[#b0b3b8]"
                    >
                        <svg v-if="item.icon === 'watch'" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'marketplace'" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'groups'" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-10c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm0 10c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'gaming'" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4-3c-.83 0-1.5-.67-1.5-1.5S18.67 9 19.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                </nav>

                <!-- Right: User Actions -->
                <div class="flex items-center gap-2">
                    <button class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e4e6eb] text-[#050505] hover:bg-[#d8dadf]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                        </svg>
                    </button>
                    <button class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e4e6eb] text-[#050505] hover:bg-[#d8dadf]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                        </svg>
                    </button>

                    <!-- Account Menu -->
                    <div class="relative" @click.stop>
                        <button
                            @click="showAccountMenu = !showAccountMenu"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb] text-sm font-bold text-[#050505] hover:bg-[#d8dadf]"
                        >
                            {{ initials }}
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            v-if="showAccountMenu"
                            class="absolute right-0 top-12 w-[360px] rounded-lg bg-white py-2 shadow-xl"
                        >
                            <!-- User Info -->
                            <Link
                                :href="route('profile.edit')"
                                class="mx-2 mb-2 flex items-center gap-3 rounded-lg p-2 hover:bg-[#f0f2f5]"
                                @click="showAccountMenu = false"
                            >
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e4e6eb] text-sm font-bold">
                                    {{ initials }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-[#050505]">{{ user?.name }}</p>
                                    <p class="text-xs text-[#65676b]">Xem trang cá nhân của bạn</p>
                                </div>
                            </Link>

                            <div class="my-2 border-t border-[#ced0d4]"></div>

                            <!-- Menu Items -->
                            <div class="mx-2 space-y-1">
                                <Link
                                    :href="route('profile.edit')"
                                    class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#f0f2f5]"
                                    @click="showAccountMenu = false"
                                >
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                                        <svg class="h-5 w-5 text-[#050505]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        </svg>
                                    </div>
                                    Cài đặt & quyền riêng tư
                                </Link>

                                <Link
                                    :href="route('profile.edit')"
                                    class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#f0f2f5]"
                                    @click="showAccountMenu = false"
                                >
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                                        <svg class="h-5 w-5 text-[#050505]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                    Cài đặt & quyền riêng tư
                                </Link>

                                <Link
                                    :href="route('profile.edit')"
                                    class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#f0f2f5]"
                                    @click="showAccountMenu = false"
                                >
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                                        <svg class="h-5 w-5 text-[#050505]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                    Trợ giúp & hỗ trợ
                                </Link>

                                <button
                                    class="flex w-full items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#f0f2f5]"
                                    @click="showAccountMenu = false"
                                >
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                                        <svg class="h-5 w-5 text-[#050505]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                        </svg>
                                    </div>
                                    Màn hình & trợ năng
                                </button>

                                <button
                                    class="flex w-full items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#f0f2f5]"
                                    @click="logout(); showAccountMenu = false"
                                >
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                                        <svg class="h-5 w-5 text-[#050505]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                                        </svg>
                                    </div>
                                    Đăng xuất
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="mx-auto flex max-w-[1920px] justify-center">
            <!-- Left Sidebar (Desktop) -->
            <aside class="sticky top-14 hidden h-[calc(100vh-3.5rem)] w-[280px] shrink-0 overflow-y-auto py-4 pr-2 xl:block">
                <nav class="space-y-1">
                    <Link
                        :href="route('profile.edit')"
                        class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#e4e6eb]"
                    >
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb] text-sm font-bold">
                            {{ initials }}
                        </div>
                        {{ user?.name }}
                    </Link>
                    <Link
                        v-for="item in navShortcuts"
                        :key="item.name"
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#e4e6eb]"
                    >
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb]">
                            <svg v-if="item.icon === 'friends'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'memories'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'saved'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'pages'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                                <path d="M7 7h10v2H7zm0 4h10v2H7zm0 4h7v2H7z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'events'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'marketplace2'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'video'" class="h-5 w-5" :style="{ color: item.color }" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                            </svg>
                        </div>
                        {{ item.name }}
                    </Link>
                </nav>

                <div class="mt-4 border-t border-[#ced0d4] pt-4 px-2">
                    <p class="text-xs font-semibold text-[#65676b]">Lối tắt của bạn</p>
                    <div class="mt-2 space-y-1">
                        <a href="#" class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-semibold text-[#050505] hover:bg-[#e4e6eb]">
                            <div class="h-9 w-9 rounded-lg bg-[#e4e6eb]"></div>
                            Nhóm của bạn
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="min-h-[calc(100vh-3.5rem)] w-full max-w-[680px] px-4 py-4">
                <slot />
            </main>

            <!-- Right Sidebar (Desktop) -->
            <aside class="sticky top-14 hidden h-[calc(100vh-3.5rem)] w-[280px] shrink-0 overflow-y-auto py-4 pl-2 xl:block">
                <!-- Sponsored -->
                <div class="mb-4">
                    <h3 class="px-2 text-sm font-semibold text-[#65676b]">Được tài trợ</h3>
                    <div class="mt-2 space-y-3">
                        <a href="#" class="flex items-center gap-3 rounded-lg px-2 py-2 hover:bg-[#e4e6eb]">
                            <div class="h-[110px] w-[110px] shrink-0 rounded-lg bg-gradient-to-br from-blue-400 to-purple-500"></div>
                            <div>
                                <p class="text-sm font-semibold text-[#050505]">Quảng cáo mẫu</p>
                                <p class="text-xs text-[#65676b]">sample.com</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="border-t border-[#ced0d4] my-3"></div>

                <!-- Friend Requests -->
                <div class="mb-4">
                    <div class="flex items-center justify-between px-2">
                        <h3 class="text-sm font-semibold text-[#65676b]">Lời mời kết bạn</h3>
                        <a href="#" class="text-sm text-[#1877f2] hover:underline">Xem tất cả</a>
                    </div>
                    <div class="mt-2 space-y-3">
                        <div class="flex items-center gap-3 rounded-lg px-2 py-2">
                            <div class="h-10 w-10 shrink-0 rounded-full bg-[#e4e6eb]"></div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-[#050505]">Người dùng 1</p>
                                <p class="text-xs text-[#65676b]">10 bạn chung</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#ced0d4] my-3"></div>

                <!-- Contacts -->
                <div>
                    <div class="flex items-center justify-between px-2">
                        <h3 class="text-sm font-semibold text-[#65676b]">Người liên hệ</h3>
                        <div class="flex gap-2">
                            <button class="text-[#65676b] hover:text-[#050505]">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 10-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 001.415-1.414l-3.85-3.85a1.007 1.007 0 00-.115-.1zM12 6.5a5.5 5.5 0 11-11 0 5.5 5.5 0 0111 0z"/>
                                </svg>
                            </button>
                            <button class="text-[#65676b] hover:text-[#050505]">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 space-y-1">
                        <a v-for="i in 5" :key="i" href="#" class="flex items-center gap-3 rounded-lg px-2 py-1.5 hover:bg-[#e4e6eb]">
                            <div class="relative">
                                <div class="h-8 w-8 rounded-full bg-[#e4e6eb]"></div>
                                <div class="absolute bottom-0 right-0 h-2.5 w-2.5 rounded-full border-2 border-white bg-[#31a24c]"></div>
                            </div>
                            <span class="text-sm font-semibold text-[#050505]">Bạn {{ i }}</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Mobile Bottom Nav -->
        <nav class="fixed bottom-0 left-0 right-0 z-50 flex items-center justify-around border-t border-[#ced0d4] bg-white py-1 lg:hidden">
            <Link
                :href="route('dashboard')"
                class="flex flex-col items-center gap-0.5 p-2"
                :class="isActive('dashboard') ? 'text-[#1877f2]' : 'text-[#65676b]'"
            >
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9.464 2.344a3 3 0 013.072 0l7 4.2A3 3 0 0121 9.2V19a3 3 0 01-3 3H6a3 3 0 01-3-3V9.2a3 3 0 011.464-2.656l7-4.2zM12 4.87a1 1 0 00-.512.138l-7 4.2A1 1 0 004 9.2V19a1 1 0 001 1h14a1 1 0 001-1V9.2a1 1 0 00-.488-.892l-7-4.2A1 1 0 0012 4.87z"/>
                </svg>
                <span class="text-xs">Trang chủ</span>
            </Link>
            <span class="flex flex-col items-center gap-0.5 p-2 text-[#65676b]">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 10-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 001.415-1.414l-3.85-3.85a1.007 1.007 0 00-.115-.1zM12 6.5a5.5 5.5 0 11-11 0 5.5 5.5 0 0111 0z"/>
                </svg>
                <span class="text-xs">Tìm</span>
            </span>
            <span class="flex flex-col items-center gap-0.5 p-2 text-[#65676b]">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
                <span class="text-xs">Thông báo</span>
            </span>
            <Link
                :href="route('profile.edit')"
                class="flex flex-col items-center gap-0.5 p-2"
                :class="isActive('profile.edit') ? 'text-[#1877f2]' : 'text-[#65676b]'"
            >
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <span class="text-xs">Hồ sơ</span>
            </Link>
        </nav>

        <!-- Spacer for mobile bottom nav -->
        <div class="h-16 shrink-0 lg:hidden" aria-hidden="true" />
    </div>
</template>
