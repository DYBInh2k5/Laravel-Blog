# 🚀 Bắt Đầu Nhanh với Laravel

## Cài Đặt & Chạy

### 1. Hoàn tất cài đặt dependencies
```bash
cd laravel-learning-project
composer install
```

**Lưu ý**: Nếu composer install chậm, bạn có thể bật PHP zip extension:
- Mở file: `D:\laragon\bin\php\php-8.3.26-Win32-vs16-x64\php.ini`
- Tìm dòng: `;extension=zip`
- Bỏ dấu `;` để thành: `extension=zip`
- Lưu file và chạy lại `composer install`

### 2. Tạo APP_KEY
```bash
php artisan key:generate
```

### 3. Cấu hình Database (SQLite - đơn giản nhất)
File `.env` đã có sẵn. Chỉ cần tạo file database:
```bash
type nul > database/database.sqlite
```

Hoặc sửa `.env` để dùng MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Chạy Migration
```bash
php artisan migrate
```

### 5. Khởi động Server
```bash
php artisan serve
```

Mở trình duyệt: **http://localhost:8000**

---

## 📚 Tài Liệu Học Tập

1. **HUONG_DAN_HOC_TAP.md** - Hướng dẫn tổng quan về Laravel
2. **VI_DU_CRUD_BLOG.md** - Ví dụ chi tiết tạo Blog CRUD

---

## 🎯 Thực Hành Ngay

### Tạo ứng dụng Blog đơn giản:

```bash
# 1. Tạo Model, Migration, Controller
php artisan make:model Post -mcr

# 2. Chỉnh sửa migration và model theo hướng dẫn trong VI_DU_CRUD_BLOG.md

# 3. Chạy migration
php artisan migrate

# 4. Tạo views theo hướng dẫn

# 5. Test ứng dụng
php artisan serve
```

---

## 🛠️ Các Lệnh Hữu Ích

```bash
# Xem tất cả routes
php artisan route:list

# Tạo controller
php artisan make:controller NoteController --resource

# Tạo model với migration
php artisan make:model Task -m

# Clear cache
php artisan cache:clear

# Mở Laravel Tinker (test code nhanh)
php artisan tinker
```

---

## 💡 Tips Học Laravel

1. **Bắt đầu từ Routes** → Controller → Model → View
2. **Đọc Laravel Documentation**: https://laravel.com/docs
3. **Thực hành nhiều** với các project nhỏ
4. **Học Eloquent ORM** - đây là sức mạnh của Laravel
5. **Sử dụng `php artisan tinker`** để test code nhanh

---

## 🎓 Lộ Trình Học

### Tuần 1-2: Cơ Bản
- Routes, Controllers, Views
- Blade Templates
- Forms & Validation

### Tuần 3-4: Database
- Migrations
- Eloquent ORM
- Relationships (hasMany, belongsTo, etc.)

### Tuần 5-6: Nâng Cao
- Authentication
- Middleware
- File Upload
- API Development

---

Chúc bạn học tốt! 🎉
