@extends('layouts.app')

@section('title', 'Sửa Bài Viết')

@section('content')
    <a href="{{ route('posts.show', $post) }}" class="back-link">← Quay lại bài viết</a>
    
    <h1>✏️ Sửa Bài Viết</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Tiêu đề: <span style="color: red;">*</span></label>
            <input 
                type="text" 
                id="title"
                name="title" 
                value="{{ old('title', $post->title) }}" 
                placeholder="Nhập tiêu đề bài viết..."
                required
            >
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Nội dung: <span style="color: red;">*</span></label>
            <textarea 
                id="content"
                name="content" 
                placeholder="Viết nội dung bài viết của bạn..."
                required
            >{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Tác giả:</label>
            <input 
                type="text" 
                id="author"
                name="author" 
                value="{{ old('author', $post->author) }}"
                placeholder="Nhập tên tác giả (tùy chọn)..."
            >
            @error('author')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="checkbox-group">
                <input 
                    type="checkbox" 
                    id="published"
                    name="published" 
                    value="1" 
                    {{ old('published', $post->published) ? 'checked' : '' }}
                >
                <label for="published" style="margin-bottom: 0;">Xuất bản</label>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn">💾 Cập Nhật</button>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">❌ Hủy</a>
        </div>
    </form>
@endsection
