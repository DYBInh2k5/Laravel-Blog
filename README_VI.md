# 🚀 Laravel Blog - Dự Án Học Laravel

Dự án Blog đơn giản để học Laravel framework với đầy đủ tính năng CRUD, API, và giao diện đẹp mắt.

---

## 📋 Tính Năng

### ✅ Web Interface
- ✨ Giao diện đẹp mắt với gradient design
- 📝 CRUD đầy đủ cho Blog Posts
- 🔍 Hiển thị danh sách bài viết với pagination
- 👁️ Xem chi tiết bài viết
- ✏️ Tạo và sửa bài viết
- 🗑️ Xóa bài viết với confirmation
- ✅ Form validation
- 📊 Trạng thái xuất bản/nháp

### 🔌 RESTful API
- GET `/api/posts` - Lấy tất cả posts
- GET `/api/posts/published` - Chỉ posts đã xuất bản
- GET `/api/posts/{id}` - Chi tiết post
- POST `/api/posts` - Tạo post mới
- PUT `/api/posts/{id}` - Cập nhật post
- DELETE `/api/posts/{id}` - Xóa post

### 🛠️ Laravel Features
- Eloquent ORM với Model `Post`
- Blade Templates với layouts
- Route Model Binding
- Form Validation
- Database Migrations
- Seeders & Factories
- API Resources

---

## 🚀 Cài Đặt Nhanh

### 1. Cài đặt dependencies
```bash
cd laravel-learning-project
composer install
```

**Lưu ý**: Nếu chậm, bật PHP zip extension trong `php.ini`:
```ini
extension=zip
```

### 2. Tạo Application Key
```bash
php artisan key:generate
```

### 3. Cấu hình Database

**SQLite (Đơn giản):**
```bash
type nul > database\database.sqlite
```

**MySQL:**
Sửa file `.env`:
```env
DB_CONNECTION=mysql
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Chạy Migrations
```bash
php artisan migrate
```

### 5. Seed Dữ Liệu Mẫu (Optional)
```bash
php artisan db:seed --class=PostSeeder
```

### 6. Khởi Động Server
```bash
php artisan serve
```

Truy cập: **http://localhost:8000**

---

## 📁 Cấu Trúc Dự Án

```
laravel-learning-project/
├── app/
│   ├── Http/Controllers/
│   │   ├── PostController.php          # Web CRUD controller
│   │   └── Api/PostApiController.php   # API controller
│   └── Models/
│       └── Post.php                     # Post model
├── database/
│   ├── migrations/
│   │   └── 2026_01_15_000001_create_posts_table.php
│   ├── seeders/
│   │   └── PostSeeder.php              # Dữ liệu mẫu
│   └── factories/
│       └── PostFactory.php             # Fake data generator
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Layout chính
│       └── posts/
│           ├── index.blade.php         # Danh sách posts
│           ├── create.blade.php        # Form tạo post
│           ├── show.blade.php          # Chi tiết post
│           └── edit.blade.php          # Form sửa post
├── routes/
│   ├── web.php                         # Web routes
│   └── api.php                         # API routes
├── BAT_DAU_NHANH.md                    # Quick start guide
├── HUONG_DAN_HOC_TAP.md                # Learning guide
├── VI_DU_CRUD_BLOG.md                  # CRUD example
├── API_DOCUMENTATION.md                # API docs
└── NEXT_STEPS.md                       # Next steps
```

---

## 📚 Tài Liệu Hướng Dẫn

1. **BAT_DAU_NHANH.md** - Hướng dẫn khởi động nhanh
2. **HUONG_DAN_HOC_TAP.md** - Hướng dẫn tổng quan về Laravel
3. **VI_DU_CRUD_BLOG.md** - Ví dụ chi tiết tạo Blog CRUD
4. **API_DOCUMENTATION.md** - Tài liệu API với examples
5. **NEXT_STEPS.md** - Các bước tiếp theo và mở rộng

---

## 🎯 Routes

### Web Routes
```
GET    /                      → Redirect to posts.index
GET    /posts                 → posts.index
GET    /posts/create          → posts.create
POST   /posts                 → posts.store
GET    /posts/{post}          → posts.show
GET    /posts/{post}/edit     → posts.edit
PUT    /posts/{post}          → posts.update
DELETE /posts/{post}          → posts.destroy
```

### API Routes
```
GET    /api/posts             → Get all posts
GET    /api/posts/published   → Get published posts
GET    /api/posts/{post}      → Get post detail
POST   /api/posts             → Create post
PUT    /api/posts/{post}      → Update post
DELETE /api/posts/{post}      → Delete post
```

Xem tất cả routes:
```bash
php artisan route:list
```

---

## 🧪 Test API

### Với cURL
```bash
# Lấy danh sách posts
curl http://localhost:8000/api/posts

# Tạo post mới
curl -X POST http://localhost:8000/api/posts \
  -H "Content-Type: application/json" \
  -d '{"title":"Test","content":"Content here","published":true}'
```

### Với Postman
1. Import collection từ `API_DOCUMENTATION.md`
2. Set base URL: `http://localhost:8000/api`
3. Test các endpoints

---

## 💡 Các Lệnh Hữu Ích

```bash
# Xem routes
php artisan route:list

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Tạo dữ liệu fake
php artisan tinker
>>> App\Models\Post::factory(20)->create()

# Rollback migrations
php artisan migrate:rollback

# Fresh migrations
php artisan migrate:fresh --seed
```

---

## 🎓 Học Laravel

### Khái Niệm Đã Học
- ✅ MVC Architecture
- ✅ Routing (web & api)
- ✅ Controllers & Resource Controllers
- ✅ Eloquent ORM & Models
- ✅ Migrations & Seeders
- ✅ Blade Templates & Layouts
- ✅ Form Validation
- ✅ Route Model Binding
- ✅ RESTful API
- ✅ JSON Responses

### Tiếp Theo Học Gì?
1. **Authentication** - Laravel Breeze/Sanctum
2. **Relationships** - hasMany, belongsTo, etc.
3. **Middleware** - Bảo vệ routes
4. **File Upload** - Upload images
5. **Email** - Gửi email notifications
6. **Testing** - PHPUnit tests
7. **Deployment** - Deploy lên production

Xem chi tiết trong `NEXT_STEPS.md`

---

## 🔥 Mở Rộng Dự Án

### Ideas
- [ ] Thêm Categories cho posts
- [ ] Thêm Comments system
- [ ] Thêm Search functionality
- [ ] Thêm Image upload
- [ ] Thêm User authentication
- [ ] Thêm Tags system
- [ ] Thêm Rich text editor
- [ ] Thêm Social sharing
- [ ] Thêm View counter
- [ ] Thêm API authentication

---

## 📖 Tài Nguyên

- [Laravel Documentation](https://laravel.com/docs)
- [Laracasts](https://laracasts.com) - Video tutorials
- [Laravel News](https://laravel-news.com)
- [Laravel Daily](https://laraveldaily.com)

---

## 🐛 Troubleshooting

### Lỗi: vendor/autoload.php not found
```bash
composer install
```

### Lỗi: No application encryption key
```bash
php artisan key:generate
```

### Lỗi: Database connection
- Check file `.env`
- Đảm bảo database đã được tạo
- Check MySQL/SQLite đang chạy

### Lỗi: Permission denied (storage/logs)
```bash
# Windows
icacls storage /grant Users:F /T
icacls bootstrap/cache /grant Users:F /T
```

---

## 📝 License

Dự án học tập - Free to use and modify

---

## 🎉 Chúc Bạn Học Tốt!

Nếu có câu hỏi, hãy:
1. Đọc Laravel Documentation
2. Check `storage/logs/laravel.log`
3. Google error message
4. Hỏi trên Laravel.io hoặc Stack Overflow

Happy coding! 💻✨
