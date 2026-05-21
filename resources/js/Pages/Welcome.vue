<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const features = [
    {
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        title: 'Kết bạn',
        desc: 'Tìm kiếm và kết nối với bạn bè, người thân một cách dễ dàng.',
    },
    {
        icon: 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
        title: 'Chia sẻ',
        desc: 'Đăng bài viết, ảnh và khoảnh khắc đáng nhớ với mọi người.',
    },
    {
        icon: 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
        title: 'Bình luận',
        desc: 'Thảo luận, tương tác và bày tỏ cảm xúc với bài viết của bạn bè.',
    },
    {
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
        title: 'Nhóm',
        desc: 'Tạo và tham gia nhóm để chia sẻ sở thích chung.',
    },
];

const stats = [
    { value: '10K+', label: 'Người dùng' },
    { value: '50K+', label: 'Bài viết' },
    { value: '100K+', label: 'Bình luận' },
    { value: '5K+', label: 'Nhóm' },
];
</script>

<template>
    <Head title="Connect — Mạng xã hội" />

    <div class="min-h-screen bg-gradient-to-b from-sky-50 via-white to-white dark:from-zinc-950 dark:via-black dark:to-black">
        <!-- Header -->
        <header class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <div class="flex items-center gap-2">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-indigo-600 shadow-lg shadow-sky-500/25">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-sky-600 dark:text-sky-400">Connect</span>
            </div>
            <nav v-if="canLogin" class="flex items-center gap-3">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="rounded-full bg-sky-500 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-sky-500/25 transition hover:bg-sky-600 hover:shadow-sky-500/40"
                >
                    Vào bảng tin
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="rounded-full px-5 py-2.5 text-sm font-semibold text-zinc-700 transition hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800"
                    >
                        Đăng nhập
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded-full bg-sky-500 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-sky-500/25 transition hover:bg-sky-600 hover:shadow-sky-500/40"
                    >
                        Đăng ký
                    </Link>
                </template>
            </nav>
        </header>

        <!-- Hero Section -->
        <main class="mx-auto max-w-7xl px-6 pb-20 pt-12 lg:pt-20">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
                <!-- Left: Text -->
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-sky-100 px-4 py-1.5 text-sm font-medium text-sky-700 dark:bg-sky-900/30 dark:text-sky-300">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-sky-500"></span>
                        </span>
                        Mạng xã hội mới
                    </div>
                    <h1 class="mt-6 text-5xl font-bold leading-tight tracking-tight text-zinc-900 dark:text-white sm:text-6xl lg:text-7xl">
                        Kết nối
                        <span class="bg-gradient-to-r from-sky-500 to-indigo-600 bg-clip-text text-transparent">thế giới</span>
                        của bạn.
                    </h1>
                    <p class="mt-6 text-lg leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Chia sẻ khoảnh khắc, kết bạn mới và khám phá thế giới qua lăng kính của bạn bè.
                        Trải nghiệm mạng xã hội hiện đại, nhanh chóng và an toàn.
                    </p>
                    <div
                        v-if="canLogin && !$page.props.auth.user"
                        class="mt-10 flex flex-wrap gap-4"
                    >
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-sky-500/25 transition hover:shadow-sky-500/40 hover:scale-105"
                        >
                            Bắt đầu miễn phí
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </Link>
                        <Link
                            :href="route('login')"
                            class="inline-flex items-center gap-2 rounded-full border-2 border-zinc-200 px-8 py-4 text-base font-bold text-zinc-700 transition hover:border-zinc-300 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-300 dark:hover:border-zinc-600 dark:hover:bg-zinc-900"
                        >
                            Tìm hiểu thêm
                        </Link>
                    </div>
                </div>

                <!-- Right: Preview Card -->
                <div class="relative">
                    <!-- Decorative elements -->
                    <div class="absolute -right-8 -top-8 h-64 w-64 rounded-full bg-gradient-to-br from-sky-400 to-indigo-500 opacity-10 blur-3xl"></div>
                    <div class="absolute -bottom-8 -left-8 h-48 w-48 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 opacity-10 blur-3xl"></div>

                    <!-- Main card -->
                    <div class="relative rounded-3xl border border-zinc-200/80 bg-white/80 p-6 shadow-2xl backdrop-blur-sm dark:border-zinc-800/80 dark:bg-zinc-950/80 sm:p-8">
                        <!-- Mock post 1 -->
                        <div class="flex gap-3 rounded-2xl bg-zinc-50 p-4 dark:bg-zinc-900/50">
                            <div class="h-12 w-12 shrink-0 rounded-full bg-gradient-to-br from-sky-400 to-indigo-500"></div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="h-3 w-20 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-12 rounded bg-zinc-100 dark:bg-zinc-800"></span>
                                </div>
                                <div class="mt-3 space-y-2">
                                    <div class="h-2.5 w-full rounded bg-zinc-200 dark:bg-zinc-700"></div>
                                    <div class="h-2.5 w-4/5 rounded bg-zinc-100 dark:bg-zinc-800"></div>
                                </div>
                                <div class="mt-4 flex gap-6">
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Mock post 2 -->
                        <div class="mt-4 flex gap-3 rounded-2xl bg-zinc-50 p-4 dark:bg-zinc-900/50">
                            <div class="h-12 w-12 shrink-0 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500"></div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="h-3 w-16 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-10 rounded bg-zinc-100 dark:bg-zinc-800"></span>
                                </div>
                                <div class="mt-3 space-y-2">
                                    <div class="h-2.5 w-full rounded bg-zinc-200 dark:bg-zinc-700"></div>
                                    <div class="h-2.5 w-3/4 rounded bg-zinc-100 dark:bg-zinc-800"></div>
                                </div>
                                <div class="mt-4 flex gap-6">
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                    <span class="h-3 w-8 rounded bg-zinc-200 dark:bg-zinc-700"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating notification -->
                        <div class="absolute -right-4 top-1/2 -translate-y-1/2 rounded-2xl border border-zinc-200 bg-white p-3 shadow-xl dark:border-zinc-800 dark:bg-zinc-900">
                            <div class="flex items-center gap-2">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-rose-400 to-pink-500"></div>
                                <div>
                                    <div class="h-2.5 w-16 rounded bg-zinc-200 dark:bg-zinc-700"></div>
                                    <div class="mt-1 h-2 w-12 rounded bg-zinc-100 dark:bg-zinc-800"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="mx-auto mt-24 grid max-w-4xl grid-cols-2 gap-8 sm:grid-cols-4">
                <div v-for="stat in stats" :key="stat.label" class="text-center">
                    <div class="text-4xl font-bold text-zinc-900 dark:text-white">{{ stat.value }}</div>
                    <div class="mt-2 text-sm text-zinc-500">{{ stat.label }}</div>
                </div>
            </div>

            <!-- Features -->
            <div class="mx-auto mt-24 max-w-5xl">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-zinc-900 dark:text-white sm:text-4xl">Tính năng nổi bật</h2>
                    <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400">Mọi thứ bạn cần để kết nối và chia sẻ</p>
                </div>
                <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div
                        v-for="feature in features"
                        :key="feature.title"
                        class="group rounded-2xl border border-zinc-200 bg-white p-6 transition hover:border-sky-200 hover:shadow-lg hover:shadow-sky-500/5 dark:border-zinc-800 dark:bg-zinc-950 dark:hover:border-sky-900"
                    >
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-sky-600 transition group-hover:bg-sky-500 group-hover:text-white dark:bg-sky-900/30 dark:text-sky-400 dark:group-hover:bg-sky-500 dark:group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" :d="feature.icon" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-zinc-900 dark:text-white">{{ feature.title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-600 dark:text-zinc-400">{{ feature.desc }}</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="border-t border-zinc-200 py-8 dark:border-zinc-800">
            <div class="mx-auto max-w-7xl px-6 text-center">
                <div class="flex items-center justify-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-sky-500 to-indigo-600">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-zinc-900 dark:text-white">Connect</span>
                </div>
                <p class="mt-4 text-sm text-zinc-500">Bản demo giao diện mạng xã hội — Được xây dựng với Laravel & Vue</p>
            </div>
        </footer>
    </div>
</template>
