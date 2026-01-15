@extends('layouts.app')

@section('title', 'Danh Sách Bài Viết')

@section('content')
    <h1>📝 Danh Sách Bài Viết</h1>
    
    <div style="margin-bottom: 20px;">
        <a href="{{ route('posts.create') }}" class="btn">➕ Tạo Bài Viết Mới</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @forelse($posts as $post)
        <div class="post-item">
            <h2>{{ $post->title }}</h2>
            
            <div class="post-meta">
                👤 Tác giả: <strong>{{ $post->author ?? 'Ẩn danh' }}</strong> | 
                📅 {{ $post->created_at->format('d/m/Y H:i') }} |
                @if($post->published)
                    <span style="color: green;">✓ Đã xuất bản</span>
                @else
                    <span style="color: orange;">⏳ Nháp</span>
                @endif
            </div>
            
            <div class="post-content">
                {{ Str::limit($post->content, 300) }}
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('posts.show', $post) }}" class="btn">👁️ Xem</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">✏️ Sửa</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">
                        🗑️ Xóa
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div style="text-align: center; padding: 40px; color: #999;">
            <p style="font-size: 1.2em;">📭 Chưa có bài viết nào.</p>
            <p>Hãy tạo bài viết đầu tiên của bạn!</p>
        </div>
    @endforelse

    <div style="margin-top: 30px;">
        {{ $posts->links() }}
    </div>
@endsection
