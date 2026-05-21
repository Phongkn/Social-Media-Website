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
        hasImage: true,
        imageColor: 'from-sky-400 to-indigo-500',
    },
    {
        author: 'Hệ thống',
        handle: 'connect',
        time: 'Hôm qua',
        body: 'Chào mừng bạn đến với Connect! Đây là mạng xã hội demo được xây dựng bằng Laravel và Vue.js. Bạn có thể tùy chỉnh giao diện và kết nối API để bắt đầu sử dụng.',
        likes: 128,
        reposts: 42,
        replies: 15,
        hasImage: false,
    },
    {
        author: 'Lan Chi',
        handle: 'lan_chi',
        time: '3 ngày',
        body: 'Vừa deploy xong tính năng mới. Feedback được hoan nghênh! 🚀',
        likes: 56,
        reposts: 12,
        replies: 6,
        hasImage: true,
        imageColor: 'from-emerald-400 to-teal-500',
    },
];

const likedPosts = ref(new Set());
const repostedPosts = ref(new Set());

function toggleLike(index) {
    if (likedPosts.value.has(index)) {
        likedPosts.value.delete(index);
    } else {
        likedPosts.value.add(index);
    }
}

function toggleRepost(index) {
    if (repostedPosts.value.has(index)) {
        repostedPosts.value.delete(index);
    } else {
        repostedPosts.value.add(index);
    }
}
</script>

<template>
    <Head title="Trang chủ" />

    <SocialLayout title="Trang chủ">
        <!-- Header -->
        <div class="sticky top-0 z-20 border-b border-zinc-200 bg-white/95 px-4 py-3 backdrop-blur dark:border-zinc-800 dark:bg-black/95 lg:top-0">
            <h1 class="text-xl font-bold">Trang chủ</h1>
        </div>

        <!-- Composer -->
        <div class="border-b border-zinc-200 p-4 dark:border-zinc-800">
            <div class="flex gap-3">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-indigo-600 text-sm font-bold text-white shadow-md">
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
                    <div class="mt-2 flex items-center justify-between border-t border-zinc-100 pt-3 dark:border-zinc-800">
                        <div class="flex gap-2">
                            <button type="button" class="rounded-full p-2 text-sky-500 transition hover:bg-sky-50 dark:hover:bg-sky-950/30" disabled>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </button>
                            <button type="button" class="rounded-full p-2 text-sky-500 transition hover:bg-sky-50 dark:hover:bg-sky-950/30" disabled>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                        <button
                            type="button"
                            class="rounded-full bg-sky-500 px-6 py-2 text-sm font-bold text-white shadow-md transition hover:bg-sky-600 hover:shadow-lg disabled:opacity-50"
                            :disabled="!draft.trim()"
                        >
                            Đăng
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feed -->
        <article
            v-for="(post, index) in feedPreview"
            :key="index"
            class="border-b border-zinc-200 transition hover:bg-zinc-50/50 dark:border-zinc-800 dark:hover:bg-zinc-900/30"
        >
            <div class="flex gap-3 p-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-sky-400 to-indigo-500 text-sm font-bold text-white shadow-md">
                    {{ post.author.charAt(0) }}
                </div>
                <div class="min-w-0 flex-1">
                    <header class="flex flex-wrap items-center gap-x-2 gap-y-0">
                        <span class="font-bold text-zinc-900 dark:text-white">{{ post.author }}</span>
                        <span class="text-sm text-zinc-500">@{{ post.handle }}</span>
                        <span class="text-sm text-zinc-400">· {{ post.time }}</span>
                    </header>
                    <p class="mt-2 whitespace-pre-wrap text-[15px] leading-relaxed text-zinc-800 dark:text-zinc-200">
                        {{ post.body }}
                    </p>

                    <!-- Image placeholder -->
                    <div v-if="post.hasImage" class="mt-3 overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-700">
                        <div :class="['h-48 w-full bg-gradient-to-br', post.imageColor]"></div>
                    </div>

                    <footer class="mt-3 flex max-w-md justify-between">
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm text-zinc-500 transition hover:bg-sky-50 hover:text-sky-600 dark:hover:bg-sky-950/40 dark:hover:text-sky-400"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            {{ post.replies }}
                        </button>
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm transition"
                            :class="repostedPosts.has(index) ? 'text-emerald-600 dark:text-emerald-400' : 'text-zinc-500 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950/40 dark:hover:text-emerald-400'"
                            @click="toggleRepost(index)"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            {{ repostedPosts.has(index) ? post.reposts + 1 : post.reposts }}
                        </button>
                        <button
                            type="button"
                            class="flex items-center gap-1.5 rounded-full p-1.5 text-sm transition"
                            :class="likedPosts.has(index) ? 'text-rose-600 dark:text-rose-400' : 'text-zinc-500 hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-rose-950/40 dark:hover:text-rose-400'"
                            @click="toggleLike(index)"
                        >
                            <svg class="h-4 w-4" :fill="likedPosts.has(index) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            {{ likedPosts.has(index) ? post.likes + 1 : post.likes }}
                        </button>
                        <button
                            type="button"
                            class="rounded-full p-1.5 text-zinc-500 transition hover:bg-sky-50 hover:text-sky-600 dark:hover:bg-sky-950/40 dark:hover:text-sky-400"
                        >
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                    </footer>
                </div>
            </div>
        </article>

        <!-- Empty state hint -->
        <div class="p-8 text-center">
            <p class="text-sm text-zinc-400">Kết nối API để hiển thị bài viết thật từ database</p>
        </div>
    </SocialLayout>
</template>
