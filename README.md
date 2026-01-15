# 📝 Laravel Blog - Dự Án Học Laravel

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

Dự án Blog đơn giản và đầy đủ để học Laravel framework từ cơ bản đến nâng cao. Bao gồm CRUD hoàn chỉnh, RESTful API, và tài liệu hướng dẫn chi tiết bằng tiếng Việt.

![Laravel Blog Screenshot](https://via.placeholder.com/800x400/667eea/ffffff?text=Laravel+Blog+Demo)

---

## ✨ Tính Năng

### 🌐 Web Interface
- ✅ CRUD đầy đủ cho Blog Posts (Create, Read, Update, Delete)
- ✅ Giao diện đẹp mắt với gradient design
- ✅ Form validation
- ✅ Pagination
- ✅ Trạng thái xuất bản/nháp
- ✅ Responsive design

### 🔌 RESTful API
- ✅ GET `/api/posts` - Lấy tất cả posts
- ✅ GET `/api/posts/published` - Chỉ posts đã xuất bản
- ✅ GET `/api/posts/{id}` - Chi tiết post
- ✅ POST `/api/posts` - Tạo post mới
- ✅ PUT `/api/posts/{id}` - Cập nhật post
- ✅ DELETE `/api/posts/{id}` - Xóa post

### 🛠️ Laravel Features
- ✅ Eloquent ORM với Model `Post`
- ✅ Blade Templates với layouts
- ✅ Route Model Binding
- ✅ Form Request Validation
- ✅ Database Migrations
- ✅ Seeders & Factories
- ✅ Resource Controllers
- ✅ API Resources

---

## 🚀 Cài Đặt Nhanh

### Yêu Cầu
- PHP >= 8.3
- Composer
- SQLite hoặc MySQL

### Bước 1: Clone Repository
```bash
git clone https://github.com/your-username/laravel-blog.git
cd laravel-blog
```

### Bước 2: Cài Đặt Dependencies
```bash
composer install
```

### Bước 3: Cấu Hình Môi Trường
```bash
# Copy file .env
cp .env.example .env

# Generate APP_KEY
php artisan key:generate
```

### Bước 4: Tạo Database
**SQLite (Đơn giản):**
```bash
# Windows
type nul > database\database.sqlite

# Linux/Mac
touch database/database.sqlite
```

**MySQL:**
Sửa file `.env`:
```env
DB_CONNECTION=mysql
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Bước 5: Chạy Migrations & Seed
```bash
php artisan migrate --seed
```

### Bước 6: Khởi Động Server
```bash
php artisan serve
```

Truy cập: **http://localhost:8000**

---

## 🎯 Hoặc Dùng Script Tự Động

### Windows
```bash
setup.bat
```

### PowerShell
```bash
.\setup.ps1
```

Script sẽ tự động:
- ✅ Cài đặt dependencies
- ✅ Generate APP_KEY
- ✅ Tạo database
- ✅ Chạy migrations
- ✅ Seed dữ liệu mẫu

---

## 📚 Tài Liệu

Dự án bao gồm tài liệu hướng dẫn đầy đủ bằng tiếng Việt:

| File | Mô Tả |
|------|-------|
| [START_HERE.md](START_HERE.md) | Bắt đầu ngay - Hướng dẫn sử dụng |
| [README_VI.md](README_VI.md) | README tiếng Việt chi tiết |
| [BAT_DAU_NHANH.md](BAT_DAU_NHANH.md) | Quick start guide |
| [HUONG_DAN_HOC_TAP.md](HUONG_DAN_HOC_TAP.md) | Hướng dẫn học Laravel |
| [VI_DU_CRUD_BLOG.md](VI_DU_CRUD_BLOG.md) | Tutorial CRUD từng bước |
| [API_DOCUMENTATION.md](API_DOCUMENTATION.md) | API docs với examples |
| [NEXT_STEPS.md](NEXT_STEPS.md) | Lộ trình học tiếp |
| [SETUP_INSTRUCTIONS.md](SETUP_INSTRUCTIONS.md) | Troubleshooting |

---

## 🎓 Học Gì Từ Dự Án Này?

### Cơ Bản
- ✅ MVC Architecture
- ✅ Routing (web & api)
- ✅ Controllers & Resource Controllers
- ✅ Eloquent ORM & Models
- ✅ Migrations & Seeders
- ✅ Blade Templates & Layouts

### Nâng Cao
- ✅ Form Validation
- ✅ Route Model Binding
- ✅ RESTful API Design
- ✅ JSON Responses
- ✅ Database Factories
- ✅ Query Scopes

---

## 📁 Cấu Trúc Dự Án

```
laravel-blog/
├── app/
│   ├── Http/Controllers/
│   │   ├── PostController.php          # Web CRUD
│   │   └── Api/PostApiController.php   # API
│   └── Models/
│       └── Post.php                     # Post model
├── database/
│   ├── migrations/
│   │   └── 2026_01_15_000001_create_posts_table.php
│   ├── seeders/
│   │   └── PostSeeder.php              # 5 bài viết mẫu
│   └── factories/
│       └── PostFactory.php             # Fake data
├── resources/
│   └── views/
│       ├── layouts/app.blade.php       # Layout chính
│       └── posts/                      # CRUD views
├── routes/
│   ├── web.php                         # Web routes
│   └── api.php                         # API routes
└── docs/                               # Tài liệu tiếng Việt
```

---

## 🔥 Demo

### Web Interface
```
http://localhost:8000
```

### API Examples

**Lấy tất cả posts:**
```bash
curl http://localhost:8000/api/posts
```

**Tạo post mới:**
```bash
curl -X POST http://localhost:8000/api/posts \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Bài viết mới",
    "content": "Nội dung...",
    "author": "Tác giả",
    "published": true
  }'
```

**Xem chi tiết:**
```bash
curl http://localhost:8000/api/posts/1
```

---

## 🛠️ Các Lệnh Hữu Ích

```bash
# Xem tất cả routes
php artisan route:list

# Tạo dữ liệu fake
php artisan tinker
>>> App\Models\Post::factory(20)->create()

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Chạy lại migrations
php artisan migrate:fresh --seed
```

---

## 🎯 Roadmap

- [ ] Authentication với Laravel Breeze
- [ ] Categories cho posts
- [ ] Comments system
- [ ] Search functionality
- [ ] Image upload
- [ ] Tags system
- [ ] Rich text editor
- [ ] API authentication với Sanctum
- [ ] Unit & Feature tests
- [ ] Docker support

---

## 🤝 Đóng Góp

Contributions, issues và feature requests đều được chào đón!

1. Fork dự án
2. Tạo branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Mở Pull Request

---

## 📖 Tài Nguyên Học Thêm

- [Laravel Documentation](https://laravel.com/docs) - Official docs
- [Laracasts](https://laracasts.com) - Video tutorials
- [Laravel News](https://laravel-news.com) - Latest news
- [Laravel Daily](https://laraveldaily.com) - Practical tutorials

---

## 📝 License

Dự án này được phát hành dưới [MIT License](LICENSE).

---

## 👨‍💻 Tác Giả

**Laravel Learning Project**

- GitHub: [@your-username](https://github.com/your-username)
- Email: your.email@example.com

---

## ⭐ Support

Nếu dự án này hữu ích, hãy cho một ⭐️!

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Tailwind CSS](https://tailwindcss.com) - CSS Framework (future)
- Cộng đồng Laravel Việt Nam

---

**Happy Coding! 🚀**

Made with ❤️ for Laravel learners
