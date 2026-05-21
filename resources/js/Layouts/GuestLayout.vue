<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-[#f0f2f5]">
        <div class="mx-auto flex min-h-screen max-w-5xl flex-col items-center justify-center px-4 py-8 lg:flex-row lg:gap-8">
            <!-- Left: Branding -->
            <div class="mb-8 text-center lg:mb-0 lg:w-1/2 lg:text-left">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-[#1877f2] lg:text-6xl">VBook</h1>
                </Link>
                <p class="mt-4 text-xl text-[#1c1e21] lg:text-2xl">
                    VBook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.
                </p>
            </div>

            <!-- Right: Form -->
            <div class="w-full max-w-md">
                <div class="rounded-lg bg-white p-6 shadow-lg">
                    <slot />
                </div>
                <p class="mt-4 text-center text-sm text-[#606770]">
                    <strong>Tạo Trang</strong> dành cho người nổi tiếng, thương hiệu hoặc doanh nghiệp.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t border-[#dadde1]">
            <div class="mx-auto max-w-5xl px-4 py-6">
                <div class="flex flex-wrap items-center gap-4 text-xs text-[#8a8d91]">
                    <span>Tiếng Việt</span>
                    <a href="#" class="hover:underline">English (US)</a>
                    <a href="#" class="hover:underline">中文(简体)</a>
                    <a href="#" class="hover:underline">日本語</a>
                    <a href="#" class="hover:underline">한국어</a>
                </div>
                <div class="my-3 border-t border-[#dadde1]"></div>
                <div class="text-xs text-[#8a8d91]">
                    VBook © 2024
                </div>
            </div>
        </footer>
    </div>
</template>
