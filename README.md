# VBook - Mạng xã hội

VBook là một mạng xã hội demo được xây dựng bằng Laravel và Vue.js, lấy cảm hứng từ giao diện của Facebook.

## Tính năng

### Hiện tại
- **Đăng ký / Đăng nhập**: Xác thực người dùng với validation tiếng Việt
- **Bảng tin**: Hiển thị bài viết từ bạn bè
- **Stories**: Xem và tạo tin (demo)
- **Bài viết**: Đăng, thích, bình luận, chia sẻ
- **Hồ sơ cá nhân**: Chỉnh sửa thông tin, đổi mật khẩu, xóa tài khoản
- **Đăng xuất**: Menu dropdown với nhiều tùy chọn

### Sắp ra mắt
- Khám phá
- Tin nhắn
- Thông báo
- Nhóm
- Marketplace

## Công nghệ

### Backend
- **Laravel 11** - PHP Framework
- **MySQL** - Cơ sở dữ liệu
- **Inertia.js** - Server-side rendering

### Frontend
- **Vue.js 3** - JavaScript Framework
- **Tailwind CSS** - CSS Framework
- **Vite** - Build tool

### Packages
- **Laravel Breeze** - Authentication scaffolding
- **Inertia.js Vue** - SPA without API

## Cài đặt

### Yêu cầu
- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL >= 8.0

### Bước 1: Clone repository
```bash
git clone https://github.com/Phongkn/Social-Media-Website.git
cd Social-Media-Website
```

### Bước 2: Cài đặt dependencies
```bash
composer install
npm install
```

### Bước 3: Cấu hình environment
```bash
cp .env.example .env
php artisan key:generate
```

Cập nhật file `.env` với thông tin database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vbook
DB_USERNAME=root
DB_PASSWORD=
```

### Bước 4: Tạo database
```sql
CREATE DATABASE vbook CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Bước 5: Chạy migration và seed
```bash
php artisan migrate:fresh --seed
```

### Bước 6: Build frontend
```bash
npm run build
```

### Bước 7: Chạy server
```bash
php artisan serve
```

Truy cập: http://127.0.0.1:8000

## Tài khoản mặc định

Sau khi chạy seeder, tài khoản mặc định sẽ là:

| Thông tin | Giá trị |
|-----------|---------|
| Email | phong@vbook.com |
| Mật khẩu | 123456 |
| Tên | Phong |

## Cấu trúc thư mục

```
Social-Media-Website/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Auth/          # Authentication controllers
│   │   └── Requests/
│   │       └── Auth/          # Form requests with validation
│   └── Models/                # Eloquent models
├── database/
│   ├── factories/             # Model factories
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   └── js/
│       ├── Components/        # Vue components
│       ├── Layouts/           # Layout components
│       └── Pages/             # Page components
├── routes/
│   ├── auth.php               # Authentication routes
│   └── web.php                # Web routes
└── lang/
    └── vi/                    # Vietnamese translations
```

## Giao diện

### Trang chủ
- Bảng tin với bài viết từ bạn bè
- Stories section
- Composer để đăng bài
- Thích, bình luận, chia sẻ

### Hồ sơ
- Ảnh bìa và avatar
- Thông tin cá nhân
- Cài đặt tài khoản
- Đổi mật khẩu
- Xóa tài khoản

### Đăng nhập / Đăng ký
- Giao diện Facebook style
- Validation tiếng Việt
- Rate limiting chống spam

## Đóng góp

Để đóng góp cho dự án:

1. Fork repository
2. Tạo feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'feat: Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Tạo Pull Request

## License

Dự án này được phát hành dưới dạng demo mục đích học tập.

## Liên hệ

- **GitHub**: [Phongkn](https://github.com/Phongkn)
- **Email**: phong@vbook.com

---

**VBook** - Kết nối thế giới của bạn 🌍
