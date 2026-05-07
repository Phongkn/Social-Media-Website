<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="min-h-screen bg-zinc-100 dark:bg-zinc-950 lg:flex lg:bg-white dark:lg:bg-black"
    >
        <!-- Brand panel -->
        <div
            class="relative flex flex-col justify-between overflow-hidden bg-gradient-to-br from-sky-600 via-sky-700 to-indigo-800 px-8 py-10 text-white lg:w-[46%] lg:min-h-screen lg:px-14 lg:py-16"
        >
            <div
                class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10 blur-3xl"
            />
            <div
                class="pointer-events-none absolute -bottom-32 -left-16 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl"
            />

            <Link
                href="/"
                class="relative text-2xl font-bold tracking-tight lg:text-3xl"
            >
                Connect
            </Link>

            <div class="relative mt-10 max-w-md lg:mt-0">
                <h1
                    class="text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl"
                >
                    Nơi mọi người gặp gỡ và chia sẻ.
                </h1>
                <p class="mt-4 text-lg text-sky-100/90">
                    Đăng nhập để xem bảng tin, cập nhật trạng thái và kết nối với
                    bạn bè.
                </p>
            </div>

            <p class="relative mt-12 text-sm text-sky-200/80 lg:mt-0">
                © Connect
            </p>
        </div>

        <!-- Form -->
        <div
            class="flex flex-1 flex-col justify-center px-4 py-10 sm:px-8 lg:px-16"
        >
            <div
                class="mx-auto w-full max-w-md rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 lg:border-0 lg:bg-transparent lg:p-0 lg:shadow-none dark:lg:bg-transparent"
            >
                <slot />
            </div>
        </div>
    </div>
</template>
