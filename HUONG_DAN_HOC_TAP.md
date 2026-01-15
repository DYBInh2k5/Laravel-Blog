# Hướng Dẫn Học Laravel

## 🚀 Bắt Đầu

### 1. Cài Đặt Dependencies
```bash
cd laravel-learning-project
composer install
npm install
```

### 2. Cấu Hình Môi Trường
File `.env` đã được tạo tự động. Cần cấu hình:
- Database connection
- APP_KEY (chạy: `php artisan key:generate`)

### 3. Chạy Migration
```bash
php artisan migrate
```

### 4. Khởi Động Server
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite (cho frontend)
npm run dev
```

Truy cập: http://localhost:8000

---

## 📚 Cấu Trúc Thư Mục Laravel

```
app/
├── Http/
│   ├── Controllers/     # Controllers xử lý logic
│   └── Middleware/      # Middleware xử lý request
├── Models/              # Eloquent Models (database)
└── Providers/           # Service Providers

routes/
├── web.php             # Routes cho web
├── api.php             # Routes cho API
└── console.php         # Console commands

resources/
├── views/              # Blade templates
├── js/                 # JavaScript files
└── css/                # CSS files

database/
├── migrations/         # Database migrations
├── seeders/           # Database seeders
└── factories/         # Model factories

config/                # Configuration files
public/                # Public assets
storage/               # Logs, cache, uploads
tests/                 # Unit & Feature tests
```

---

## 🎯 Các Khái Niệm Quan Trọng

### 1. Routes (Định tuyến)
File: `routes/web.php`
```php
Route::get('/hello', function () {
    return 'Hello Laravel!';
});
```

### 2. Controllers
Tạo controller:
```bash
php artisan make:controller UserController
```

### 3. Models & Database
Tạo model với migration:
```bash
php artisan make:model Post -m
```

### 4. Views (Blade Templates)
File: `resources/views/welcome.blade.php`
```blade
<h1>{{ $title }}</h1>
@foreach($items as $item)
    <p>{{ $item }}</p>
@endforeach
```

### 5. Eloquent ORM
```php
// Lấy tất cả records
$users = User::all();

// Tìm theo ID
$user = User::find(1);

// Tạo mới
User::create(['name' => 'John', 'email' => 'john@example.com']);
```

---

## 🛠️ Các Lệnh Artisan Hữu Ích

```bash
# Xem tất cả routes
php artisan route:list

# Tạo controller
php artisan make:controller PostController --resource

# Tạo model với migration và factory
php artisan make:model Product -mf

# Tạo migration
php artisan make:migration create_posts_table

# Chạy migrations
php artisan migrate

# Rollback migration
php artisan migrate:rollback

# Tạo seeder
php artisan make:seeder UserSeeder

# Chạy seeders
php artisan db:seed

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Tạo middleware
php artisan make:middleware CheckAge

# Tạo request validation
php artisan make:request StorePostRequest
```

---

## 📖 Ví Dụ Thực Hành

### Tạo CRUD Đơn Giản cho Blog

1. **Tạo Model, Migration, Controller**
```bash
php artisan make:model Post -mcr
```

2. **Định nghĩa Migration** (`database/migrations/xxxx_create_posts_table.php`)
```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->timestamps();
});
```

3. **Chạy Migration**
```bash
php artisan migrate
```

4. **Định nghĩa Routes** (`routes/web.php`)
```php
Route::resource('posts', PostController::class);
```

5. **Implement Controller** (`app/Http/Controllers/PostController.php`)

---

## 🔗 Tài Nguyên Học Tập

- [Laravel Documentation](https://laravel.com/docs)
- [Laracasts](https://laracasts.com) - Video tutorials
- [Laravel News](https://laravel-news.com)
- [Laravel Daily](https://laraveldaily.com)

---

## 💡 Tips

1. Luôn đọc documentation của Laravel
2. Sử dụng `php artisan tinker` để test code nhanh
3. Học Eloquent ORM kỹ - đây là sức mạnh của Laravel
4. Hiểu về Service Container và Dependency Injection
5. Thực hành với các project nhỏ trước khi làm project lớn

---

Chúc bạn học tốt! 🎉
