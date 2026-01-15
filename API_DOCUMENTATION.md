# 📡 API Documentation - Laravel Blog

## Base URL
```
http://localhost:8000/api
```

---

## Endpoints

### 1. Lấy danh sách tất cả bài viết
**GET** `/posts`

**Response:**
```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "Tiêu đề bài viết",
        "content": "Nội dung...",
        "author": "Tác giả",
        "published": true,
        "created_at": "2026-01-15T10:00:00.000000Z",
        "updated_at": "2026-01-15T10:00:00.000000Z"
      }
    ],
    "per_page": 10,
    "total": 50
  }
}
```

---

### 2. Lấy chỉ bài viết đã xuất bản
**GET** `/posts/published`

**Response:** Giống như endpoint trên nhưng chỉ trả về bài viết có `published = true`

---

### 3. Lấy chi tiết một bài viết
**GET** `/posts/{id}`

**Example:** `GET /posts/1`

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Tiêu đề bài viết",
    "content": "Nội dung đầy đủ...",
    "author": "Tác giả",
    "published": true,
    "created_at": "2026-01-15T10:00:00.000000Z",
    "updated_at": "2026-01-15T10:00:00.000000Z"
  }
}
```

---

### 4. Tạo bài viết mới
**POST** `/posts`

**Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Body:**
```json
{
  "title": "Tiêu đề bài viết mới",
  "content": "Nội dung bài viết...",
  "author": "Tên tác giả",
  "published": true
}
```

**Validation Rules:**
- `title`: required, max 255 characters
- `content`: required
- `author`: optional, max 100 characters
- `published`: optional, boolean (default: false)

**Response (201 Created):**
```json
{
  "success": true,
  "message": "Post created successfully",
  "data": {
    "id": 2,
    "title": "Tiêu đề bài viết mới",
    "content": "Nội dung bài viết...",
    "author": "Tên tác giả",
    "published": true,
    "created_at": "2026-01-15T11:00:00.000000Z",
    "updated_at": "2026-01-15T11:00:00.000000Z"
  }
}
```

---

### 5. Cập nhật bài viết
**PUT** `/posts/{id}`

**Example:** `PUT /posts/1`

**Headers:**
```
Content-Type: application/json
Accept: application/json
```

**Body:**
```json
{
  "title": "Tiêu đề đã cập nhật",
  "content": "Nội dung đã cập nhật...",
  "author": "Tác giả mới",
  "published": false
}
```

**Response:**
```json
{
  "success": true,
  "message": "Post updated successfully",
  "data": {
    "id": 1,
    "title": "Tiêu đề đã cập nhật",
    "content": "Nội dung đã cập nhật...",
    "author": "Tác giả mới",
    "published": false,
    "created_at": "2026-01-15T10:00:00.000000Z",
    "updated_at": "2026-01-15T12:00:00.000000Z"
  }
}
```

---

### 6. Xóa bài viết
**DELETE** `/posts/{id}`

**Example:** `DELETE /posts/1`

**Response:**
```json
{
  "success": true,
  "message": "Post deleted successfully"
}
```

---

## Test API với cURL

### Lấy danh sách posts
```bash
curl http://localhost:8000/api/posts
```

### Tạo post mới
```bash
curl -X POST http://localhost:8000/api/posts \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "title": "Test Post",
    "content": "This is a test post content",
    "author": "API Tester",
    "published": true
  }'
```

### Lấy chi tiết post
```bash
curl http://localhost:8000/api/posts/1
```

### Cập nhật post
```bash
curl -X PUT http://localhost:8000/api/posts/1 \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "title": "Updated Title",
    "content": "Updated content",
    "author": "Updated Author",
    "published": false
  }'
```

### Xóa post
```bash
curl -X DELETE http://localhost:8000/api/posts/1
```

---

## Test API với Postman

1. Mở Postman
2. Tạo collection mới: "Laravel Blog API"
3. Thêm các requests theo endpoints trên
4. Set Base URL: `http://localhost:8000/api`
5. Thêm headers:
   - `Content-Type: application/json`
   - `Accept: application/json`

---

## Test API với JavaScript (Fetch)

```javascript
// Lấy danh sách posts
fetch('http://localhost:8000/api/posts')
  .then(response => response.json())
  .then(data => console.log(data));

// Tạo post mới
fetch('http://localhost:8000/api/posts', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    title: 'New Post from JS',
    content: 'Content here...',
    author: 'JavaScript Dev',
    published: true
  })
})
  .then(response => response.json())
  .then(data => console.log(data));
```

---

## Error Responses

### Validation Error (422)
```json
{
  "message": "The title field is required.",
  "errors": {
    "title": [
      "The title field is required."
    ]
  }
}
```

### Not Found (404)
```json
{
  "message": "No query results for model [App\\Models\\Post] 999"
}
```

---

## Pagination

API tự động phân trang với 10 items mỗi page. Để lấy page khác:

```
GET /api/posts?page=2
```

Response bao gồm thông tin pagination:
- `current_page`: Trang hiện tại
- `per_page`: Số items mỗi trang
- `total`: Tổng số items
- `last_page`: Trang cuối cùng
- `next_page_url`: URL trang tiếp theo
- `prev_page_url`: URL trang trước

---

## Tips

1. Luôn set header `Accept: application/json` để nhận response dạng JSON
2. Sử dụng Postman hoặc Insomnia để test API dễ dàng
3. Check Laravel logs tại `storage/logs/laravel.log` nếu có lỗi
4. Sử dụng `php artisan route:list` để xem tất cả routes
