# 🤝 Hướng Dẫn Đóng Góp

Cảm ơn bạn đã quan tâm đến việc đóng góp cho dự án Laravel Blog! Chúng tôi rất hoan nghênh mọi đóng góp từ cộng đồng.

---

## 📋 Mục Lục

- [Code of Conduct](#code-of-conduct)
- [Làm Thế Nào Để Đóng Góp](#làm-thế-nào-để-đóng-góp)
- [Báo Cáo Lỗi](#báo-cáo-lỗi)
- [Đề Xuất Tính Năng](#đề-xuất-tính-năng)
- [Pull Requests](#pull-requests)
- [Coding Standards](#coding-standards)
- [Commit Messages](#commit-messages)

---

## 📜 Code of Conduct

Dự án này tuân theo [Code of Conduct](CODE_OF_CONDUCT.md). Bằng cách tham gia, bạn đồng ý tuân thủ các quy tắc này.

---

## 🚀 Làm Thế Nào Để Đóng Góp

### 1. Fork Repository

Click nút "Fork" ở góc trên bên phải của trang.

### 2. Clone Repository

```bash
git clone https://github.com/your-username/laravel-blog.git
cd laravel-blog
```

### 3. Tạo Branch Mới

```bash
git checkout -b feature/ten-tinh-nang
```

Quy tắc đặt tên branch:
- `feature/` - Tính năng mới
- `bugfix/` - Sửa lỗi
- `docs/` - Cập nhật tài liệu
- `refactor/` - Refactor code
- `test/` - Thêm tests

### 4. Thực Hiện Thay Đổi

- Viết code sạch và dễ đọc
- Tuân thủ coding standards
- Thêm comments khi cần thiết
- Test kỹ trước khi commit

### 5. Commit Changes

```bash
git add .
git commit -m "feat: thêm tính năng xyz"
```

### 6. Push to GitHub

```bash
git push origin feature/ten-tinh-nang
```

### 7. Tạo Pull Request

- Mở Pull Request từ branch của bạn
- Mô tả chi tiết những gì bạn đã thay đổi
- Link đến issue liên quan (nếu có)
- Đợi review

---

## 🐛 Báo Cáo Lỗi

Nếu bạn tìm thấy lỗi, hãy tạo issue với thông tin sau:

### Template Báo Cáo Lỗi

```markdown
**Mô tả lỗi:**
Mô tả ngắn gọn về lỗi.

**Các bước tái hiện:**
1. Vào '...'
2. Click vào '...'
3. Scroll xuống '...'
4. Thấy lỗi

**Kết quả mong đợi:**
Mô tả những gì bạn mong đợi sẽ xảy ra.

**Kết quả thực tế:**
Mô tả những gì thực sự xảy ra.

**Screenshots:**
Nếu có, thêm screenshots để giải thích vấn đề.

**Môi trường:**
- OS: [e.g. Windows 11]
- PHP Version: [e.g. 8.3]
- Laravel Version: [e.g. 12.x]
- Browser: [e.g. Chrome 120]

**Thông tin thêm:**
Thêm bất kỳ thông tin nào khác về vấn đề.
```

---

## 💡 Đề Xuất Tính Năng

Có ý tưởng cho tính năng mới? Tuyệt vời!

### Template Đề Xuất Tính Năng

```markdown
**Tính năng đề xuất:**
Mô tả ngắn gọn về tính năng.

**Vấn đề cần giải quyết:**
Tính năng này giải quyết vấn đề gì?

**Giải pháp đề xuất:**
Mô tả cách bạn muốn tính năng hoạt động.

**Giải pháp thay thế:**
Có giải pháp thay thế nào khác không?

**Thông tin thêm:**
Screenshots, mockups, hoặc ví dụ code.
```

---

## 🔀 Pull Requests

### Checklist Trước Khi Submit PR

- [ ] Code tuân thủ coding standards
- [ ] Đã test kỹ các thay đổi
- [ ] Đã cập nhật documentation (nếu cần)
- [ ] Đã thêm/cập nhật tests (nếu cần)
- [ ] Commit messages rõ ràng
- [ ] Branch được rebase với main/master
- [ ] Không có conflicts

### Review Process

1. Maintainer sẽ review PR của bạn
2. Có thể yêu cầu thay đổi
3. Sau khi approve, PR sẽ được merge
4. Branch của bạn có thể được xóa

---

## 📝 Coding Standards

### PHP Code Style

Tuân thủ [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Properties
    protected $fillable = ['title', 'content'];
    
    // Methods
    public function getExcerptAttribute(): string
    {
        return substr($this->content, 0, 100);
    }
}
```

### Blade Templates

```blade
{{-- Comments --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        
        @foreach($items as $item)
            <p>{{ $item->name }}</p>
        @endforeach
    </div>
@endsection
```

### JavaScript

```javascript
// Use ES6+ syntax
const fetchPosts = async () => {
    try {
        const response = await fetch('/api/posts');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
    }
};
```

---

## 💬 Commit Messages

Sử dụng [Conventional Commits](https://www.conventionalcommits.org/).

### Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- `feat`: Tính năng mới
- `fix`: Sửa lỗi
- `docs`: Cập nhật documentation
- `style`: Thay đổi formatting, không ảnh hưởng code
- `refactor`: Refactor code
- `test`: Thêm hoặc sửa tests
- `chore`: Cập nhật build tasks, package manager, etc.

### Examples

```bash
# Tính năng mới
git commit -m "feat(posts): thêm chức năng search"

# Sửa lỗi
git commit -m "fix(api): sửa lỗi pagination"

# Cập nhật docs
git commit -m "docs(readme): cập nhật hướng dẫn cài đặt"

# Refactor
git commit -m "refactor(controller): tối ưu PostController"
```

---

## 🧪 Testing

### Chạy Tests

```bash
# Chạy tất cả tests
php artisan test

# Chạy specific test
php artisan test --filter PostTest

# Với coverage
php artisan test --coverage
```

### Viết Tests

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    public function test_can_create_post(): void
    {
        $response = $this->post('/api/posts', [
            'title' => 'Test Post',
            'content' => 'Test Content',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
        ]);
    }
}
```

---

## 📚 Documentation

Khi thêm tính năng mới, hãy cập nhật:

- [ ] README.md
- [ ] API_DOCUMENTATION.md (nếu thêm API)
- [ ] Code comments
- [ ] PHPDoc blocks

### PHPDoc Example

```php
/**
 * Get all published posts.
 *
 * @return \Illuminate\Database\Eloquent\Collection
 */
public function getPublishedPosts()
{
    return Post::where('published', true)->get();
}
```

---

## ❓ Câu Hỏi?

Nếu có câu hỏi, bạn có thể:

- Mở issue với label "question"
- Email: your.email@example.com
- Tham gia Discord/Slack (nếu có)

---

## 🎉 Cảm Ơn!

Cảm ơn bạn đã đóng góp cho dự án! Mỗi đóng góp, dù lớn hay nhỏ, đều rất có ý nghĩa.

---

**Happy Contributing! 🚀**
