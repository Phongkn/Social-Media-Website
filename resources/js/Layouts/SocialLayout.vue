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
        name: 'Khám phá',
        disabled: true,
        icon: 'explore',
    },
    {
        name: 'Tin nhắn',
        disabled: true,
        icon: 'message',
    },
    {
        name: 'Thông báo',
        disabled: true,
        icon: 'bell',
    },
    {
        name: 'Hồ sơ',
        href: () => route('profile.edit'),
        routeName: 'profile.edit',
        icon: 'user',
    },
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
    <div
        class="min-h-screen bg-zinc-100 text-zinc-900 dark:bg-black dark:text-zinc-100"
    >
        <!-- Mobile top bar -->
        <header
            class="sticky top-0 z-30 flex h-14 items-center justify-between border-b border-zinc-200 bg-white/95 px-4 backdrop-blur dark:border-zinc-800 dark:bg-zinc-950/95 lg:hidden"
        >
            <Link
                :href="route('dashboard')"
                class="text-xl font-bold tracking-tight text-sky-600 dark:text-sky-400"
            >
                Connect
            </Link>
            <span class="truncate text-sm font-medium text-zinc-600 dark:text-zinc-400">
                {{ title }}
            </span>
            <button
                type="button"
                class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 text-xs font-semibold text-white"
                @click="mobileMenuOpen = !mobileMenuOpen"
            >
                {{ initials }}
            </button>
        </header>

        <!-- Mobile slide menu -->
        <div
            v-show="mobileMenuOpen"
            class="fixed inset-0 z-40 bg-black/40 lg:hidden"
            @click.self="mobileMenuOpen = false"
        >
            <div
                class="absolute end-0 top-0 flex h-full w-64 flex-col border-s border-zinc-200 bg-white shadow-xl dark:border-zinc-800 dark:bg-zinc-950"
            >
                <div class="border-b border-zinc-200 p-4 dark:border-zinc-800">
                    <p class="font-semibold">{{ user?.name }}</p>
                    <p class="text-sm text-zinc-500">{{ user?.email }}</p>
                </div>
                <nav class="flex flex-1 flex-col gap-1 p-2">
                    <template v-for="item in navMain" :key="item.name">
                        <Link
                            v-if="item.href && !item.disabled"
                            :href="item.href()"
                            class="rounded-lg px-3 py-2.5 text-sm font-medium transition"
                            :class="
                                isActive(item.routeName)
                                    ? 'bg-sky-50 text-sky-700 dark:bg-sky-950/50 dark:text-sky-300'
                                    : 'text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900'
                            "
                            @click="mobileMenuOpen = false"
                        >
                            {{ item.name }}
                        </Link>
                        <span
                            v-else
                            class="cursor-not-allowed rounded-lg px-3 py-2.5 text-sm text-zinc-400 dark:text-zinc-600"
                        >
                            {{ item.name }}
                            <span class="text-xs">· sắp có</span>
                        </span>
                    </template>
                </nav>
                <div class="border-t border-zinc-200 p-2 dark:border-zinc-800">
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="block w-full rounded-lg px-3 py-2 text-start text-sm font-medium text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-950/30"
                        @click="mobileMenuOpen = false"
                    >
                        Đăng xuất
                    </Link>
                </div>
            </div>
        </div>

        <div
            class="mx-auto flex max-w-6xl justify-center lg:min-h-screen lg:px-4"
        >
            <!-- Desktop left rail -->
            <aside
                class="sticky top-0 hidden h-screen w-56 shrink-0 flex-col border-e border-transparent py-6 pe-4 xl:w-64 xl:pe-6 lg:flex"
            >
                <Link
                    :href="route('dashboard')"
                    class="mb-8 px-3 text-2xl font-bold tracking-tight text-sky-600 dark:text-sky-400"
                >
                    Connect
                </Link>

                <nav class="flex flex-1 flex-col gap-1">
                    <template v-for="item in navMain" :key="item.name">
                        <Link
                            v-if="item.href && !item.disabled"
                            :href="item.href()"
                            class="group flex items-center gap-4 rounded-full px-4 py-3 text-lg transition"
                            :class="
                                isActive(item.routeName)
                                    ? 'font-bold text-zinc-900 dark:text-white'
                                    : 'font-medium text-zinc-600 hover:bg-zinc-200/80 dark:text-zinc-400 dark:hover:bg-zinc-900'
                            "
                        >
                            <span
                                class="flex h-10 w-10 items-center justify-center rounded-full text-zinc-800 dark:text-zinc-200"
                                :class="
                                    isActive(item.routeName)
                                        ? 'bg-sky-100 dark:bg-sky-900/40'
                                        : 'bg-zinc-200/60 group-hover:bg-zinc-300/60 dark:bg-zinc-800 dark:group-hover:bg-zinc-700'
                                "
                            >
                                <svg
                                    v-if="item.icon === 'home'"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    />
                                </svg>
                                <svg
                                    v-else-if="item.icon === 'user'"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </span>
                            {{ item.name }}
                        </Link>
                        <div
                            v-else
                            class="flex cursor-not-allowed items-center gap-4 rounded-full px-4 py-3 text-lg font-medium text-zinc-400 dark:text-zinc-600"
                        >
                            <span
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-zinc-200/40 dark:bg-zinc-800/60"
                            >
                                <svg
                                    v-if="item.icon === 'explore'"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                                <svg
                                    v-else-if="item.icon === 'message'"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                    />
                                </svg>
                                <svg
                                    v-else-if="item.icon === 'bell'"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                    />
                                </svg>
                            </span>
                            {{ item.name }}
                        </div>
                    </template>
                </nav>

                <button
                    type="button"
                    class="mt-4 w-full rounded-full bg-sky-500 py-3 text-center text-lg font-bold text-white shadow-sm transition hover:bg-sky-600 dark:bg-sky-600 dark:hover:bg-sky-500"
                >
                    Đăng bài
                </button>

                <div class="mt-auto space-y-1 border-t border-zinc-200 pt-4 dark:border-zinc-800">
                    <div
                        class="flex items-center gap-3 rounded-full px-1 py-2"
                    >
                        <span
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 text-sm font-semibold text-white"
                        >
                            {{ initials }}
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold">
                                {{ user?.name }}
                            </p>
                            <p class="truncate text-xs text-zinc-500">
                                @{{ user?.email?.split('@')[0] ?? 'user' }}
                            </p>
                        </div>
                    </div>
                    <Link
                        :href="route('profile.edit')"
                        class="block rounded-full px-4 py-2 text-sm font-medium text-zinc-600 hover:bg-zinc-200/80 dark:text-zinc-400 dark:hover:bg-zinc-900"
                    >
                        Cài đặt tài khoản
                    </Link>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="block w-full rounded-full px-4 py-2 text-start text-sm font-medium text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-950/30"
                    >
                        Đăng xuất
                    </Link>
                </div>
            </aside>

            <!-- Main feed column -->
            <main
                class="min-h-[calc(100dvh-3.5rem)] w-full max-w-xl flex-1 border-x border-zinc-200 bg-white dark:border-zinc-800 dark:bg-black lg:min-h-screen"
            >
                <slot />
            </main>

            <!-- Right widgets (desktop) -->
            <aside
                class="sticky top-0 hidden h-screen w-80 shrink-0 py-6 ps-6 xl:block"
            >
                <div class="space-y-4">
                    <div
                        class="flex items-center gap-2 rounded-full border border-zinc-200 bg-zinc-100 px-4 py-2.5 dark:border-zinc-800 dark:bg-zinc-900"
                    >
                        <svg
                            class="h-5 w-5 text-zinc-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                        <input
                            type="search"
                            placeholder="Tìm kiếm"
                            class="w-full border-0 bg-transparent text-sm placeholder-zinc-400 focus:outline-none focus:ring-0 dark:text-zinc-200"
                            disabled
                        />
                    </div>

                    <div
                        class="overflow-hidden rounded-2xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950"
                    >
                        <h3
                            class="border-b border-zinc-200 px-4 py-3 text-xl font-bold dark:border-zinc-800"
                        >
                            Xu hướng
                        </h3>
                        <ul class="divide-y divide-zinc-100 dark:divide-zinc-800">
                            <li
                                v-for="i in 4"
                                :key="i"
                                class="px-4 py-3 hover:bg-zinc-50 dark:hover:bg-zinc-900/50"
                            >
                                <p class="text-xs text-zinc-500">
                                    Xu hướng tại Việt Nam
                                </p>
                                <p class="font-semibold">#demo{{ i }}</p>
                                <p class="text-xs text-zinc-500">
                                    {{ 12 + i * 3 }} nghìn bài viết
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="overflow-hidden rounded-2xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-950"
                    >
                        <h3
                            class="border-b border-zinc-200 px-4 py-3 text-xl font-bold dark:border-zinc-800"
                        >
                            Gợi ý theo dõi
                        </h3>
                        <ul class="divide-y divide-zinc-100 dark:divide-zinc-800">
                            <li
                                v-for="i in 3"
                                :key="i"
                                class="flex items-center justify-between gap-2 px-4 py-3"
                            >
                                <div class="flex min-w-0 items-center gap-2">
                                    <span
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-200 text-sm font-medium dark:bg-zinc-700"
                                    >
                                        U{{ i }}
                                    </span>
                                    <div class="min-w-0">
                                        <p class="truncate font-semibold">
                                            Người dùng {{ i }}
                                        </p>
                                        <p class="truncate text-sm text-zinc-500">
                                            @user{{ i }}
                                        </p>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="shrink-0 rounded-full bg-zinc-900 px-4 py-1.5 text-sm font-bold text-white dark:bg-white dark:text-zinc-900"
                                >
                                    Theo dõi
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Mobile bottom nav -->
        <nav
            class="fixed bottom-0 left-0 right-0 z-30 flex items-center justify-around border-t border-zinc-200 bg-white/95 py-2 backdrop-blur dark:border-zinc-800 dark:bg-zinc-950/95 lg:hidden"
        >
            <Link
                :href="route('dashboard')"
                class="flex flex-col items-center gap-0.5 p-2 text-xs"
                :class="
                    isActive('dashboard')
                        ? 'text-sky-600 dark:text-sky-400'
                        : 'text-zinc-500'
                "
            >
                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
                Nhà
            </Link>
            <span class="flex flex-col items-center gap-0.5 p-2 text-xs text-zinc-400">
                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
                Tìm
            </span>
            <span class="flex flex-col items-center gap-0.5 p-2 text-xs text-zinc-400">
                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                </svg>
                Chuông
            </span>
            <Link
                :href="route('profile.edit')"
                class="flex flex-col items-center gap-0.5 p-2 text-xs"
                :class="
                    isActive('profile.edit')
                        ? 'text-sky-600 dark:text-sky-400'
                        : 'text-zinc-500'
                "
            >
                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                </svg>
                Hồ sơ
            </Link>
        </nav>

        <!-- Spacer for mobile bottom nav -->
        <div class="h-16 shrink-0 lg:hidden" aria-hidden="true" />
    </div>
</template>
