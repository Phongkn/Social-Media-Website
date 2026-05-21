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
</script>

<template>
    <Head title="VBook — Mạng xã hội" />

    <div class="min-h-screen bg-[#f0f2f5]">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
                <div class="flex items-center gap-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1877f2]">
                        <span class="text-2xl font-bold text-white">V</span>
                    </div>
                    <span class="text-3xl font-bold text-[#1877f2]">VBook</span>
                </div>
                <nav v-if="canLogin" class="flex items-center gap-3">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md bg-[#1877f2] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#166fe5] transition"
                    >
                        Vào bảng tin
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md bg-[#1877f2] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#166fe5] transition"
                        >
                            Đăng nhập
                        </Link>
                    </template>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="mx-auto max-w-6xl px-4 py-12">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <!-- Left: Text -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl font-bold text-[#1c1e21] sm:text-5xl lg:text-6xl">
                        VBook
                    </h1>
                    <p class="mt-4 text-xl text-[#606770] sm:text-2xl">
                        VBook giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.
                    </p>
                </div>

                <!-- Right: Register Form -->
                <div class="mx-auto w-full max-w-md">
                    <div class="rounded-lg bg-white p-6 shadow-lg">
                        <h2 class="text-2xl font-bold text-[#1c1e21]">Tạo tài khoản mới</h2>
                        <p class="mt-1 text-sm text-[#606770]">Nhanh chóng và dễ dàng.</p>

                        <div class="my-4 border-t border-[#dadde1]"></div>

                        <form v-if="canRegister" class="space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <input
                                    type="text"
                                    placeholder="Họ"
                                    class="rounded-md border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#1c1e21] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                                />
                                <input
                                    type="text"
                                    placeholder="Tên"
                                    class="rounded-md border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#1c1e21] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                                />
                            </div>
                            <input
                                type="email"
                                placeholder="Email hoặc số điện thoại"
                                class="w-full rounded-md border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#1c1e21] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                            />
                            <input
                                type="password"
                                placeholder="Mật khẩu mới"
                                class="w-full rounded-md border border-[#dadde1] bg-[#f5f6f7] px-4 py-3 text-[#1c1e21] placeholder-[#8a8d91] focus:border-[#1877f2] focus:outline-none focus:ring-1 focus:ring-[#1877f2]"
                            />

                            <p class="text-xs text-[#777]">
                                Những người dùng dịch vụ của chúng tôi có thể đã tải thông tin liên hệ của bạn lên VBook.
                                <a href="#" class="text-[#1877f2] hover:underline">Tìm hiểu thêm</a>.
                            </p>

                            <p class="text-xs text-[#777]">
                                Bằng cách nhấp vào Đăng ký, bạn đồng ý với
                                <a href="#" class="text-[#1877f2] hover:underline">Điều khoản</a>,
                                <a href="#" class="text-[#1877f2] hover:underline">Chính sách quyền riêng tư</a> và
                                <a href="#" class="text-[#1877f2] hover:underline">Chính sách cookie</a> của chúng tôi.
                            </p>

                            <div class="text-center">
                                <Link
                                    :href="route('register')"
                                    class="inline-block w-full rounded-md bg-[#00a400] px-6 py-3 text-lg font-bold text-white hover:bg-[#009200] transition"
                                >
                                    Đăng ký
                                </Link>
                            </div>

                            <p class="text-center text-sm">
                                <Link :href="route('login')" class="font-bold text-[#1877f2] hover:underline">
                                    Đã có tài khoản?
                                </Link>
                            </p>
                        </form>

                        <div v-else class="text-center">
                            <Link
                                :href="route('login')"
                                class="inline-block w-full rounded-md bg-[#1877f2] px-6 py-3 text-lg font-bold text-white hover:bg-[#166fe5] transition"
                            >
                                Đăng nhập
                            </Link>
                        </div>
                    </div>

                    <p class="mt-4 text-center text-sm text-[#606770]">
                        <strong>Tạo Trang</strong> dành cho người nổi tiếng, thương hiệu hoặc doanh nghiệp.
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-[#dadde1] mt-12">
            <div class="mx-auto max-w-6xl px-4 py-6">
                <div class="flex flex-wrap items-center gap-4 text-xs text-[#8a8d91]">
                    <span>Tiếng Việt</span>
                    <a href="#" class="hover:underline">English (US)</a>
                    <a href="#" class="hover:underline">中文(简体)</a>
                    <a href="#" class="hover:underline">日本語</a>
                    <a href="#" class="hover:underline">한국어</a>
                    <a href="#" class="hover:underline">Français (France)</a>
                    <a href="#" class="hover:underline">Español</a>
                    <a href="#" class="hover:underline">Português (Brasil)</a>
                </div>
                <div class="my-3 border-t border-[#dadde1]"></div>
                <div class="flex flex-wrap items-center gap-4 text-xs text-[#8a8d91]">
                    <a href="#" class="hover:underline">Đăng ký</a>
                    <a href="#" class="hover:underline">Đăng nhập</a>
                    <a href="#" class="hover:underline">Messenger</a>
                    <a href="#" class="hover:underline">VBook Lite</a>
                    <a href="#" class="hover:underline">Video</a>
                    <a href="#" class="hover:underline">Địa điểm</a>
                    <a href="#" class="hover:underline">Trò chơi</a>
                    <a href="#" class="hover:underline">Marketplace</a>
                    <a href="#" class="hover:underline">Meta Pay</a>
                    <a href="#" class="hover:underline">Meta Store</a>
                </div>
                <div class="mt-4 text-xs text-[#8a8d91]">
                    VBook © 2024
                </div>
            </div>
        </footer>
    </div>
</template>
