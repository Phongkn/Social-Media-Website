<script setup>
import { computed, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

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

const mobileMenuOpen = ref(false);

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
    { name: 'Bạn bè', icon: 'friends' },
    { name: 'Kỷ niệm', icon: 'memories' },
    { name: 'Đã lưu', icon: 'saved' },
    { name: 'Trang', icon: 'pages' },
    { name: 'Sự kiện', icon: 'events' },
];

function isActive(routeName) {
    try {
        return route().current(routeName);
    } catch {
        return false;
    }
}
</script>

<template>
    <div class="min-h-screen bg-[#f0f2f5]">
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
                        <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#65676b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
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
                        <svg v-if="item.icon === 'home'" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9.464 2.344a3 3 0 013.072 0l7 4.2A3 3 0 0121 9.2V19a3 3 0 01-3 3H6a3 3 0 01-3-3V9.2a3 3 0 011.464-2.656l7-4.2zM12 4.87a1 1 0 00-.512.138l-7 4.2A1 1 0 004 9.2V19a1 1 0 001 1h14a1 1 0 001-1V9.2a1 1 0 00-.488-.892l-7-4.2A1 1 0 0012 4.87z"/>
                        </svg>
                    </Link>
                    <div
                        v-for="item in navMain.filter(i => i.disabled)"
                        :key="item.name"
                        class="flex h-12 w-24 cursor-not-allowed items-center justify-center rounded-lg text-[#b0b3b8]"
                    >
                        <svg v-if="item.icon === 'watch'" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'marketplace'" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'groups'" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <svg v-else-if="item.icon === 'gaming'" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </nav>

                <!-- Right: User Actions -->
                <div class="flex items-center gap-2">
                    <button class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e4e6eb] text-[#050505] hover:bg-[#d8dadf]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </button>
                    <button class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e4e6eb] text-[#050505] hover:bg-[#d8dadf]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </button>
                    <Link :href="route('profile.edit')" class="flex items-center gap-1">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#e4e6eb] text-sm font-bold text-[#050505]">
                            {{ initials }}
                        </div>
                    </Link>
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
                            <svg v-if="item.icon === 'friends'" class="h-5 w-5 text-[#1877f2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'memories'" class="h-5 w-5 text-[#1877f2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'saved'" class="h-5 w-5 text-[#1877f2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'pages'" class="h-5 w-5 text-[#f7931e]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <svg v-else-if="item.icon === 'events'" class="h-5 w-5 text-[#e74c3c]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
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
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </button>
                            <button class="text-[#65676b] hover:text-[#050505]">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
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
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <span class="text-xs">Tìm</span>
            </span>
            <span class="flex flex-col items-center gap-0.5 p-2 text-[#65676b]">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="text-xs">Thông báo</span>
            </span>
            <Link
                :href="route('profile.edit')"
                class="flex flex-col items-center gap-0.5 p-2"
                :class="isActive('profile.edit') ? 'text-[#1877f2]' : 'text-[#65676b]'"
            >
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="text-xs">Hồ sơ</span>
            </Link>
        </nav>

        <!-- Spacer for mobile bottom nav -->
        <div class="h-16 shrink-0 lg:hidden" aria-hidden="true" />
    </div>
</template>
