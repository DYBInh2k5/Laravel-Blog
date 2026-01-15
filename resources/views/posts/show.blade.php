@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="back-link">← Quay lại danh sách</a>
    
    <h1>{{ $post->title }}</h1>
    
    <div class="post-meta" style="margin-bottom: 30px; padding: 15px; background: #f8f9fa; border-radius: 5px;">
        <div style="margin-bottom: 10px;">
            👤 <strong>Tác giả:</strong> {{ $post->author ?? 'Ẩn danh' }}
        </div>
        <div style="margin-bottom: 10px;">
            📅 <strong>Ngày tạo:</strong> {{ $post->created_at->format('d/m/Y H:i') }}
        </div>
        <div style="margin-bottom: 10px;">
            🔄 <strong>Cập nhật:</strong> {{ $post->updated_at->format('d/m/Y H:i') }}
        </div>
        <div>
            📊 <strong>Trạng thái:</strong> 
            @if($post->published)
                <span style="color: green; font-weight: bold;">✓ Đã xuất bản</span>
            @else
                <span style="color: orange; font-weight: bold;">⏳ Nháp</span>
            @endif
        </div>
    </div>

    <div class="post-content" style="padding: 20px; background: #f8f9fa; border-radius: 5px; margin-bottom: 30px;">
        {!! nl2br(e($post->content)) !!}
    </div>

    <div class="action-buttons">
        <a href="{{ route('posts.edit', $post) }}" class="btn">✏️ Sửa Bài Viết</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button 
                type="submit" 
                class="btn btn-danger" 
                onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')"
            >
                🗑️ Xóa Bài Viết
            </button>
        </form>
    </div>
@endsection
