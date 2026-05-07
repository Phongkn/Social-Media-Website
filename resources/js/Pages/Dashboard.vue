<script setup>
import SocialLayout from '@/Layouts/SocialLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const draft = ref('');

const feedPreview = [
    {
        author: 'Minh Anh',
        handle: 'minhanh',
        time: '2 giờ',
        body: 'Chia sẻ một ngày đẹp trời ☀️ Ai rảnh cà phê không?',
        likes: 24,
        reposts: 3,
        replies: 8,
    },
    {
        author: 'Hệ thống',
        handle: 'connect',
        time: 'Hôm qua',
        body: 'Chào mừng bạn đến với Connect. Đây là bản xem trước bảng tin — bạn có thể thay bằng dữ liệu thật từ backend.',
        likes: 128,
        reposts: 42,
        replies: 15,
    },
    {
        author: 'Lan Chi',
        handle: 'lan_chi',
        time: '3 ngày',
        body: 'Vừa deploy xong tính năng mới. Feedback được hoan nghênh!',
        likes: 56,
        reposts: 12,
        replies: 6,
    },
];
</script>

<template>
    <Head title="Trang chủ" />

    <SocialLayout title="Trang chủ">
        <div
            class="sticky top-0 z-20 border-b border-zinc-200 bg-white/90 px-4 py-3 backdrop-blur dark:border-zinc-800 dark:bg-black/90 lg:top-0"
        >
            <h1 class="text-xl font-bold">Trang chủ</h1>
        </div>

        <!-- Composer -->
        <div
            class="border-b border-zinc-200 p-4 dark:border-zinc-800"
        >
            <div class="flex gap-3">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 text-sm font-bold text-white"
                >
                    {{ user?.name?.charAt(0)?.toUpperCase() ?? '?' }}
                </div>
                <div class="min-w-0 flex-1">
                    <label class="sr-only">Nội dung bài viết</label>
                    <textarea
                        v-model="draft"
                        rows="3"
                        placeholder="Chia sẻ điều gì đó..."
                        class="w-full resize-none border-0 bg-transparent text-lg placeholder-zinc-400 focus:outline-none focus:ring-0 dark:text-zinc-100"
                    />
                    <div class="mt-2 flex justify-end border-t border-zinc-100 pt-3 dark:border-zinc-800">
                        <button
                            type="button"
                            class="rounded-full bg-sky-500 px-5 py-2 text-sm font-bold text-white opacity-50"
                            disabled
                        >
                            Đăng
                        </button>
                    </div>
                    <p class="mt-1 text-xs text-zinc-500">
                        Nút Đăng sẽ hoạt động khi bạn nối API bài viết.
                    </p>
                </div>
            </div>
        </div>

        <!-- Feed -->
        <article
            v-for="(post, index) in feedPreview"
            :key="index"
            class="border-b border-zinc-200 px-4 py-4 transition hover:bg-zinc-50 dark:border-zinc-800 dark:hover:bg-zinc-900/40"
        >
            <div class="flex gap-3">
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-200 text-sm font-semibold text-zinc-600 dark:bg-zinc-800 dark:text-zinc-300"
                >
                    {{ post.author.charAt(0) }}
                </div>
                <div class="min-w-0 flex-1">
                    <header class="flex flex-wrap items-baseline gap-x-2 gap-y-0">
                        <span class="font-bold">{{ post.author }}</span>
                        <span class="text-sm text-zinc-500"
                            >@{{ post.handle }}</span
                        >
                        <span class="text-sm text-zinc-400">· {{ post.time }}</span>
                    </header>
                    <p class="mt-1 whitespace-pre-wrap text-[15px] leading-relaxed">
                        {{ post.body }}
                    </p>
                    <footer
                        class="mt-3 flex max-w-md justify-between text-zinc-500"
                    >
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm transition hover:bg-sky-50 hover:text-sky-600 dark:hover:bg-sky-950/40 dark:hover:text-sky-400"
                        >
                            <svg
                                class="h-4 w-4"
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
                            {{ post.replies }}
                        </button>
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm transition hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950/40 dark:hover:text-emerald-400"
                        >
                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                />
                            </svg>
                            {{ post.reposts }}
                        </button>
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm transition hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-rose-950/40 dark:hover:text-rose-400"
                        >
                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                />
                            </svg>
                            {{ post.likes }}
                        </button>
                    </footer>
                </div>
            </div>
        </article>
    </SocialLayout>
</template>
