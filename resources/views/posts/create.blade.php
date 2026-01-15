@extends('layouts.app')

@section('title', 'Tạo Bài Viết Mới')

@section('content')
    <a href="{{ route('posts.index') }}" class="back-link">← Quay lại danh sách</a>
    
    <h1>✍️ Tạo Bài Viết Mới</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Tiêu đề: <span style="color: red;">*</span></label>
            <input 
                type="text" 
                id="title"
                name="title" 
                value="{{ old('title') }}" 
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
            >{{ old('content') }}</textarea>
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
                value="{{ old('author') }}"
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
                    {{ old('published') ? 'checked' : '' }}
                >
                <label for="published" style="margin-bottom: 0;">Xuất bản ngay</label>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn">💾 Tạo Bài Viết</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">❌ Hủy</a>
        </div>
    </form>
@endsection
