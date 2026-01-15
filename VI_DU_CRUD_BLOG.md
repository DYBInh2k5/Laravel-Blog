# Ví Dụ: Tạo Blog CRUD Đơn Giản

## Bước 1: Tạo Model, Migration và Controller

```bash
php artisan make:model Post -mcr
```

Lệnh này tạo:
- Model: `app/Models/Post.php`
- Migration: `database/migrations/xxxx_create_posts_table.php`
- Controller: `app/Http/Controllers/PostController.php` (resource controller)

---

## Bước 2: Định Nghĩa Migration

Mở file `database/migrations/xxxx_create_posts_table.php`:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('author')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
```

---

## Bước 3: Cấu Hình Model

Mở file `app/Models/Post.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'published'
    ];

    protected $casts = [
        'published' => 'boolean',
    ];
}
```

---

## Bước 4: Định Nghĩa Routes

Mở file `routes/web.php` và thêm:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes cho Post
Route::resource('posts', PostController::class);
```

Route resource tự động tạo các routes:
- GET /posts - index (danh sách)
- GET /posts/create - create (form tạo mới)
- POST /posts - store (lưu bài mới)
- GET /posts/{id} - show (xem chi tiết)
- GET /posts/{id}/edit - edit (form sửa)
- PUT/PATCH /posts/{id} - update (cập nhật)
- DELETE /posts/{id} - destroy (xóa)

---

## Bước 5: Implement Controller

Mở file `app/Http/Controllers/PostController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Hiển thị danh sách posts
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Hiển thị form tạo post mới
    public function create()
    {
        return view('posts.create');
    }

    // Lưu post mới vào database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'nullable|max:100',
            'published' => 'boolean'
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Bài viết đã được tạo thành công!');
    }

    // Hiển thị chi tiết một post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Hiển thị form sửa post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Cập nhật post trong database
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'nullable|max:100',
            'published' => 'boolean'
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Bài viết đã được cập nhật!');
    }

    // Xóa post khỏi database
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Bài viết đã được xóa!');
    }
}
```

---

## Bước 6: Tạo Views

### Layout chính: `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; background: #f4f4f4; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 5px; }
        h1, h2 { color: #333; margin-bottom: 20px; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        textarea { min-height: 150px; }
        .post-item { border-bottom: 1px solid #eee; padding: 15px 0; }
        .post-item:last-child { border-bottom: none; }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```

### Index: `resources/views/posts/index.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Danh Sách Bài Viết')

@section('content')
    <h1>Danh Sách Bài Viết</h1>
    
    <a href="{{ route('posts.create') }}" class="btn">Tạo Bài Viết Mới</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($posts as $post)
        <div class="post-item">
            <h2>{{ $post->title }}</h2>
            <p>{{ Str::limit($post->content, 200) }}</p>
            <p><small>Tác giả: {{ $post->author ?? 'Ẩn danh' }} | {{ $post->created_at->format('d/m/Y') }}</small></p>
            <a href="{{ route('posts.show', $post) }}" class="btn">Xem</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn">Sửa</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
            </form>
        </div>
    @empty
        <p>Chưa có bài viết nào.</p>
    @endforelse

    {{ $posts->links() }}
@endsection
```

### Create: `resources/views/posts/create.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Tạo Bài Viết Mới')

@section('content')
    <h1>Tạo Bài Viết Mới</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Tiêu đề:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Nội dung:</label>
            <textarea name="content" required>{{ old('content') }}</textarea>
            @error('content')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Tác giả:</label>
            <input type="text" name="author" value="{{ old('author') }}">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
                Xuất bản ngay
            </label>
        </div>

        <button type="submit" class="btn">Tạo Bài Viết</button>
        <a href="{{ route('posts.index') }}" class="btn btn-danger">Hủy</a>
    </form>
@endsection
```

### Show: `resources/views/posts/show.blade.php`

```blade
@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    
    <p><small>Tác giả: {{ $post->author ?? 'Ẩn danh' }} | {{ $post->created_at->format('d/m/Y H:i') }}</small></p>
    
    <div style="margin: 20px 0;">
        {{ $post->content }}
    </div>

    <a href="{{ route('posts.index') }}" class="btn">Quay lại</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn">Sửa</a>
    
    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
    </form>
@endsection
```

### Edit: `resources/views/posts/edit.blade.php`

```blade
@extends('layouts.app')

@section('title', 'Sửa Bài Viết')

@section('content')
    <h1>Sửa Bài Viết</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Tiêu đề:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Nội dung:</label>
            <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
            @error('content')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>Tác giả:</label>
            <input type="text" name="author" value="{{ old('author', $post->author) }}">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="published" value="1" {{ old('published', $post->published) ? 'checked' : '' }}>
                Xuất bản
            </label>
        </div>

        <button type="submit" class="btn">Cập Nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-danger">Hủy</a>
    </form>
@endsection
```

---

## Bước 7: Chạy Migration

```bash
php artisan migrate
```

---

## Bước 8: Test Ứng Dụng

```bash
php artisan serve
```

Truy cập: http://localhost:8000/posts

---

## Các Khái Niệm Đã Học

1. **Model**: Đại diện cho bảng trong database
2. **Migration**: Tạo/sửa cấu trúc database
3. **Controller**: Xử lý logic nghiệp vụ
4. **Routes**: Định tuyến URL
5. **Views (Blade)**: Hiển thị giao diện
6. **Validation**: Kiểm tra dữ liệu đầu vào
7. **Eloquent ORM**: Thao tác database dễ dàng
8. **Route Model Binding**: Tự động load model từ ID

---

## Mở Rộng

- Thêm authentication (đăng nhập/đăng ký)
- Thêm categories cho posts
- Upload hình ảnh
- Thêm comments
- Tìm kiếm và filter
- API endpoints
