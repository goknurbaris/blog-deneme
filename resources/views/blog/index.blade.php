@extends('layouts.app') @section('title', 'Blog Yazılarım') @section('content') <h1>🚀 Blog Yazılarım</h1>
    <hr>

    @foreach($posts as $post)
        <div style="border-bottom: 1px solid #eee; padding: 15px 0;">
            <h2>{{ $post->title }}</h2>
            <div style="margin-top: 10px;">
    <a href="{{ route('blog.edit', $post->id) }}" style="color: #ffc107; text-decoration: none; margin-right: 15px;">✏️ Düzenle</a>

    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background:none; border:none; color:red; cursor:pointer;" onclick="return confirm('Emin misin?')">🗑️ Sil</button>
    </form>
</div>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <small>Tarih: {{ $post->created_at->diffForHumans() }}</small>
        </div>
    @endforeach
@endsection
