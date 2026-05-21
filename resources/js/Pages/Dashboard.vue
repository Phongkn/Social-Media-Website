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
        comments: 8,
        shares: 3,
        hasImage: true,
        imageColor: 'from-sky-400 to-indigo-500',
    },
    {
        author: 'Hệ thống',
        handle: 'vbook',
        time: 'Hôm qua',
        body: 'Chào mừng bạn đến với VBook! Đây là mạng xã hội demo được xây dựng bằng Laravel và Vue.js. Bạn có thể tùy chỉnh giao diện và kết nối API để bắt đầu sử dụng.',
        likes: 128,
        comments: 15,
        shares: 42,
        hasImage: false,
    },
    {
        author: 'Lan Chi',
        handle: 'lan_chi',
        time: '3 ngày',
        body: 'Vừa deploy xong tính năng mới. Feedback được hoan nghênh! 🚀',
        likes: 56,
        comments: 6,
        shares: 12,
        hasImage: true,
        imageColor: 'from-emerald-400 to-teal-500',
    },
];

const likedPosts = ref(new Set());

function toggleLike(index) {
    if (likedPosts.value.has(index)) {
        likedPosts.value.delete(index);
    } else {
        likedPosts.value.add(index);
    }
}
</script>

<template>
    <Head title="Trang chủ" />

    <SocialLayout title="Trang chủ">
        <!-- Stories Section -->
        <div class="mb-4 rounded-lg bg-white p-4 shadow-sm">
            <div class="flex gap-2 overflow-x-auto pb-2">
                <div class="flex h-[180px] w-[112px] shrink-0 cursor-pointer flex-col rounded-xl bg-gradient-to-b from-blue-500 to-purple-600 p-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-blue-500">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div class="mt-auto text-center text-xs font-semibold text-white">Tạo tin</div>
                </div>
                <div v-for="i in 5" :key="i" class="flex h-[180px] w-[112px] shrink-0 cursor-pointer flex-col rounded-xl bg-gradient-to-b from-gray-200 to-gray-300">
                    <div class="p-2">
                        <div class="h-8 w-8 rounded-full border-[3px] border-blue-500 bg-gray-300"></div>
                    </div>
                    <div class="mt-auto p-2 text-xs font-semibold text-gray-700">Bạn {{ i }}</div>
                </div>
            </div>
        </div>

        <!-- Composer -->
        <div class="mb-4 rounded-lg bg-white p-4 shadow-sm">
            <div class="flex gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#e4e6eb] text-sm font-bold text-[#050505]">
                    {{ user?.name?.charAt(0)?.toUpperCase() ?? '?' }}
                </div>
                <button class="flex-1 rounded-full bg-[#f0f2f5] px-4 py-2.5 text-left text-[#65676b] hover:bg-[#e4e6eb]">
                    {{ user?.name }} ơi, bạn đang nghĩ gì thế?
                </button>
            </div>
            <div class="my-3 border-t border-[#ced0d4]"></div>
            <div class="flex items-center justify-around">
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5]">
                    <svg class="h-6 w-6 text-[#f3425f]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Video trực tiếp
                </button>
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5]">
                    <svg class="h-6 w-6 text-[#45bd62]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Ảnh/video
                </button>
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5]">
                    <svg class="h-6 w-6 text-[#f7b928]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Cảm xúc/hoạt động
                </button>
            </div>
        </div>

        <!-- Feed -->
        <div class="space-y-4">
            <article
                v-for="(post, index) in feedPreview"
                :key="index"
                class="rounded-lg bg-white shadow-sm"
            >
                <!-- Post Header -->
                <div class="flex items-center justify-between p-4 pb-0">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-[#e4e6eb]"></div>
                        <div>
                            <p class="text-sm font-semibold text-[#050505]">{{ post.author }}</p>
                            <p class="text-xs text-[#65676b]">{{ post.time }} · 🌐</p>
                        </div>
                    </div>
                    <button class="text-[#65676b] hover:text-[#050505]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>

                <!-- Post Content -->
                <p class="px-4 py-3 text-[15px] text-[#050505]">{{ post.body }}</p>

                <!-- Post Image -->
                <div v-if="post.hasImage" class="bg-gray-100">
                    <div :class="['h-80 w-full bg-gradient-to-br', post.imageColor]"></div>
                </div>

                <!-- Post Stats -->
                <div class="flex items-center justify-between px-4 py-2">
                    <div class="flex items-center gap-1">
                        <div class="flex -space-x-1">
                            <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#1877f2] text-white">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                            </span>
                            <span class="flex h-5 w-5 items-center justify-center rounded-full bg-[#f3425f] text-white">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </span>
                        </div>
                        <span class="text-sm text-[#65676b]">{{ likedPosts.has(index) ? post.likes + 1 : post.likes }}</span>
                    </div>
                    <div class="flex gap-4 text-sm text-[#65676b]">
                        <span>{{ post.comments }} bình luận</span>
                        <span>{{ post.shares }} lượt chia sẻ</span>
                    </div>
                </div>

                <div class="mx-4 border-t border-[#ced0d4]"></div>

                <!-- Post Actions -->
                <div class="flex items-center justify-around px-4 py-1">
                    <button
                        class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold transition hover:bg-[#f0f2f5]"
                        :class="likedPosts.has(index) ? 'text-[#1877f2]' : 'text-[#65676b]'"
                        @click="toggleLike(index)"
                    >
                        <svg class="h-5 w-5" :fill="likedPosts.has(index) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                        </svg>
                        Thích
                    </button>
                    <button class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold text-[#65676b] transition hover:bg-[#f0f2f5]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Bình luận
                    </button>
                    <button class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold text-[#65676b] transition hover:bg-[#f0f2f5]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Chia sẻ
                    </button>
                </div>
            </article>
        </div>

        <!-- Empty state hint -->
        <div class="mt-4 rounded-lg bg-white p-4 text-center shadow-sm">
            <p class="text-sm text-[#65676b]">Kết nối API để hiển thị bài viết thật từ database</p>
        </div>
    </SocialLayout>
</template>
