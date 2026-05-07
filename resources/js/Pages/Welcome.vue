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
</script>

<template>
    <Head title="Connect — Mạng xã hội" />

    <div
        class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-black dark:text-zinc-100"
    >
        <header
            class="mx-auto flex max-w-6xl items-center justify-between px-4 py-5 sm:px-6"
        >
            <span class="text-2xl font-bold tracking-tight text-sky-600 dark:text-sky-400"
                >Connect</span
            >
            <nav v-if="canLogin" class="flex items-center gap-3">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="rounded-full bg-zinc-900 px-5 py-2 text-sm font-semibold text-white dark:bg-white dark:text-zinc-900"
                >
                    Vào bảng tin
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="rounded-full px-4 py-2 text-sm font-semibold text-zinc-700 hover:bg-zinc-200 dark:text-zinc-300 dark:hover:bg-zinc-800"
                    >
                        Đăng nhập
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded-full bg-sky-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-600"
                    >
                        Đăng ký
                    </Link>
                </template>
            </nav>
        </header>

        <main class="mx-auto max-w-6xl px-4 pb-20 pt-6 sm:px-6 lg:pt-12">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
                <div>
                    <h1
                        class="text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl"
                    >
                        Thấy thế giới qua lăng kính của bạn bè.
                    </h1>
                    <p class="mt-6 text-lg text-zinc-600 dark:text-zinc-400">
                        Bảng tin, bài viết và hồ sơ theo phong cách mạng xã hội
                        hiện đại — sẵn sàng để bạn mở rộng tính năng phía sau.
                    </p>
                    <div
                        v-if="canLogin && !$page.props.auth.user"
                        class="mt-10 flex flex-wrap gap-4"
                    >
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="inline-flex rounded-full bg-sky-500 px-8 py-3 text-base font-bold text-white shadow-lg shadow-sky-500/25 transition hover:bg-sky-600"
                        >
                            Tạo tài khoản
                        </Link>
                        <Link
                            :href="route('login')"
                            class="inline-flex rounded-full border-2 border-zinc-300 px-8 py-3 text-base font-bold text-zinc-800 transition hover:bg-zinc-100 dark:border-zinc-600 dark:text-zinc-100 dark:hover:bg-zinc-900"
                        >
                            Đã có tài khoản
                        </Link>
                    </div>
                </div>

                <div
                    class="relative rounded-3xl border border-zinc-200 bg-white p-6 shadow-xl dark:border-zinc-800 dark:bg-zinc-950 sm:p-8"
                >
                    <div
                        class="absolute -right-6 -top-6 hidden h-24 w-24 rounded-full bg-gradient-to-br from-sky-400 to-indigo-500 opacity-20 blur-2xl sm:block"
                    />
                    <p class="text-sm font-semibold uppercase tracking-wide text-sky-600 dark:text-sky-400">
                        Xem trước bảng tin
                    </p>
                    <div class="mt-6 space-y-4">
                        <div
                            v-for="i in 3"
                            :key="i"
                            class="flex gap-3 rounded-2xl bg-zinc-50 p-4 dark:bg-zinc-900/80"
                        >
                            <div
                                class="h-10 w-10 shrink-0 rounded-full bg-gradient-to-br from-sky-400 to-indigo-500"
                            />
                            <div class="min-w-0 flex-1 space-y-2">
                                <div class="flex gap-2">
                                    <span
                                        class="h-3 w-24 rounded bg-zinc-200 dark:bg-zinc-700"
                                    />
                                    <span
                                        class="h-3 w-16 rounded bg-zinc-100 dark:bg-zinc-800"
                                    />
                                </div>
                                <div class="space-y-1.5">
                                    <div
                                        class="h-2.5 w-full rounded bg-zinc-200 dark:bg-zinc-700"
                                    />
                                    <div
                                        class="h-2.5 w-4/5 rounded bg-zinc-100 dark:bg-zinc-800"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer
            class="border-t border-zinc-200 py-8 text-center text-sm text-zinc-500 dark:border-zinc-800"
        >
            Connect — bản demo giao diện mạng xã hội
        </footer>
    </div>
</template>
