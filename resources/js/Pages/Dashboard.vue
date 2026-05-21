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
                <div class="flex h-[200px] w-[112px] shrink-0 cursor-pointer flex-col rounded-xl bg-gradient-to-b from-blue-500 to-purple-600 p-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-blue-500">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div class="mt-auto text-center text-xs font-semibold text-white">Tạo tin</div>
                </div>
                <div v-for="i in 5" :key="i" class="flex h-[200px] w-[112px] shrink-0 cursor-pointer flex-col rounded-xl bg-gradient-to-b from-gray-200 to-gray-300">
                    <div class="p-2">
                        <div class="h-9 w-9 rounded-full border-[3px] border-blue-500 bg-gray-300"></div>
                    </div>
                    <div class="mt-auto p-2 text-xs font-semibold text-gray-700">Bạn {{ i }}</div>
                </div>
            </div>
        </div>

        <!-- Composer -->
        <div class="mb-4 rounded-lg bg-white p-4 shadow-sm">
            <div class="flex gap-3">
                <div class="h-10 w-10 shrink-0 rounded-full bg-[#e4e6eb]"></div>
                <button class="flex-1 rounded-full bg-[#f0f2f5] px-4 py-2.5 text-left text-[#65676b] hover:bg-[#e4e6eb]">
                    {{ user?.name }} ơi, bạn đang nghĩ gì thế?
                </button>
            </div>
            <div class="my-3 border-t border-[#ced0d4]"></div>
            <div class="flex items-center justify-around">
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#65676b] hover:bg-[#f0f2f5]">
                    <svg class="h-7 w-7 text-[#f3425f]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23 7l-7 5 7 5V7z"/>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                    </svg>
                    Video trực tiếp
                </button>
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#45bd62] hover:bg-[#f0f2f5]">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                        <path d="M12 12l-3-3-2 2V9l2-2 3 3 5-5v2l-5 5z"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                    </svg>
                    Ảnh/video
                </button>
                <button class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-[#f7b928] hover:bg-[#f0f2f5]">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-4-8c.79 0 1.5-.71 1.5-1.5S8.79 9 8 9s-1.5.71-1.5 1.5S7.21 12 8 12zm8 0c.79 0 1.5-.71 1.5-1.5S16.79 9 16 9s-1.5.71-1.5 1.5.71 1.5 1.5 1.5zm-4 5.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
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
                            <p class="text-sm font-semibold text-[#050505] hover:underline cursor-pointer">{{ post.author }}</p>
                            <p class="text-xs text-[#65676b]">{{ post.time }} · 🌐</p>
                        </div>
                    </div>
                    <button class="flex h-9 w-9 items-center justify-center rounded-full text-[#65676b] hover:bg-[#f0f2f5]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </button>
                </div>

                <!-- Post Content -->
                <p class="px-4 py-3 text-[15px] leading-relaxed text-[#050505]">{{ post.body }}</p>

                <!-- Post Image -->
                <div v-if="post.hasImage" class="bg-gray-100">
                    <div :class="['h-80 w-full bg-gradient-to-br', post.imageColor]"></div>
                </div>

                <!-- Post Stats -->
                <div class="flex items-center justify-between px-4 py-2">
                    <div class="flex items-center gap-1">
                        <div class="flex -space-x-1">
                            <span class="flex h-[18px] w-[18px] items-center justify-center rounded-full bg-[#1877f2]">
                                <svg class="h-2.5 w-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                            </span>
                            <span class="flex h-[18px] w-[18px] items-center justify-center rounded-full bg-[#e74c3c]">
                                <svg class="h-2.5 w-2.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </span>
                        </div>
                        <span class="text-sm text-[#65676b] hover:underline cursor-pointer">{{ likedPosts.has(index) ? post.likes + 1 : post.likes }}</span>
                    </div>
                    <div class="flex gap-4 text-sm text-[#65676b]">
                        <span class="hover:underline cursor-pointer">{{ post.comments }} bình luận</span>
                        <span class="hover:underline cursor-pointer">{{ post.shares }} lượt chia sẻ</span>
                    </div>
                </div>

                <div class="mx-4 border-t border-[#ced0d4]"></div>

                <!-- Post Actions -->
                <div class="flex items-center justify-around px-2 py-1">
                    <button
                        class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold transition hover:bg-[#f0f2f5]"
                        :class="likedPosts.has(index) ? 'text-[#1877f2]' : 'text-[#65676b]'"
                        @click="toggleLike(index)"
                    >
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path v-if="likedPosts.has(index)" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                            <path v-else d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"/>
                        </svg>
                        Thích
                    </button>
                    <button class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold text-[#65676b] transition hover:bg-[#f0f2f5]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                        </svg>
                        Bình luận
                    </button>
                    <button class="flex flex-1 items-center justify-center gap-2 rounded-lg py-2 text-sm font-semibold text-[#65676b] transition hover:bg-[#f0f2f5]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92-1.31-2.92-2.92-2.92z"/>
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
