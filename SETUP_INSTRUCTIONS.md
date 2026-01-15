# 🔧 Hướng Dẫn Setup Chi Tiết

## ⚠️ Vấn Đề Hiện Tại

Composer đang cài đặt chậm do thiếu PHP zip extension. Quá trình đang chạy trong background.

---

## ✅ Giải Pháp Nhanh

### Bước 1: Bật PHP Zip Extension

1. Mở file PHP config:
```
D:\laragon\bin\php\php-8.3.26-Win32-vs16-x64\php.ini
```

2. Tìm dòng (Ctrl+F):
```ini
;extension=zip
```

3. Bỏ dấu `;` để thành:
```ini
extension=zip
```

4. Lưu file

### Bước 2: Cài Đặt Lại

Mở terminal mới và chạy:

```bash
cd D:\Downloads\oooo\laravel-learning-project

# Xóa vendor cũ (nếu có)
rmdir /s /q vendor

# Cài đặt lại (sẽ nhanh hơn nhiều)
composer install

# Generate app key
php artisan key:generate

# Tạo database SQLite
type nul > database\database.sqlite

# Chạy migrations
php artisan migrate

# Seed dữ liệu mẫu
php artisan db:seed --class=PostSeeder

# Khởi động server
php artisan serve
```

---

## 🚀 Hoặc Dùng Laragon

Nếu bạn đang dùng Laragon:

### Option 1: Tạo Project Mới Trong Laragon

1. Mở Laragon
2. Click **Menu** → **Quick app** → **Laravel**
3. Nhập tên: `blog-app`
4. Đợi Laragon tạo xong
5. Copy các file code từ dự án này sang:
   - `app/Models/Post.php`
   - `app/Http/Controllers/PostController.php`
   - `app/Http/Controllers/Api/PostApiController.php`
   - `database/migrations/2026_01_15_000001_create_posts_table.php`
   - `database/seeders/PostSeeder.php`
   - `database/factories/PostFactory.php`
   - `resources/views/layouts/app.blade.php`
   - `resources/views/posts/*`
   - `routes/web.php`
   - `routes/api.php`

### Option 2: Sử dụng Laragon Terminal

1. Mở Laragon
2. Click **Terminal**
3. Chạy các lệnh ở Bước 2 phía trên

---

## 🎯 Sau Khi Cài Đặt Xong

### 1. Kiểm Tra Server
```bash
php artisan serve
```

Truy cập: http://localhost:8000

### 2. Test API
```bash
# Lấy danh sách posts
curl http://localhost:8000/api/posts

# Tạo post mới
curl -X POST http://localhost:8000/api/posts ^
  -H "Content-Type: application/json" ^
  -d "{\"title\":\"Test\",\"content\":\"Content\",\"published\":true}"
```

### 3. Xem Routes
```bash
php artisan route:list
```

### 4. Test với Tinker
```bash
php artisan tinker

# Trong tinker:
>>> App\Models\Post::all()
>>> App\Models\Post::factory(5)->create()
>>> $post = App\Models\Post::first()
>>> $post->title
```

---

## 📊 Kiểm Tra Tiến Trình Cài Đặt

Mở terminal mới và chạy:

```bash
cd D:\Downloads\oooo\laravel-learning-project

# Kiểm tra xem autoload.php đã có chưa
dir vendor\autoload.php

# Nếu có, chạy:
php artisan --version
```

Nếu thấy Laravel version → Cài đặt thành công!

---

## 🐛 Troubleshooting

### Lỗi: "vendor/autoload.php not found"
→ Composer chưa cài xong, đợi thêm hoặc cài lại

### Lỗi: "No application encryption key"
```bash
php artisan key:generate
```

### Lỗi: "Database connection failed"
```bash
# Tạo database SQLite
type nul > database\database.sqlite

# Hoặc sửa .env cho MySQL
DB_CONNECTION=mysql
DB_DATABASE=laravel_blog
```

### Lỗi: "Class 'Post' not found"
```bash
composer dump-autoload
```

---

## 💡 Tips

1. **Luôn dùng Laragon Terminal** - Đã config sẵn PHP path
2. **Bật zip extension** - Cài đặt nhanh hơn 10x
3. **Dùng SQLite** - Đơn giản nhất cho học tập
4. **Check logs** - `storage/logs/laravel.log` khi có lỗi

---

## 📞 Nếu Vẫn Gặp Vấn Đề

Bạn có thể:

1. **Tạo project Laravel mới** và copy code vào
2. **Dùng Docker** với Laravel Sail
3. **Dùng online IDE** như Laravel Playground

---

Chúc bạn setup thành công! 🎉
