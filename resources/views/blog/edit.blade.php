@extends('layouts.app')

@section('title', 'Yazıyı Düzenle')

@section('content')
    <h1>📝 Yazıyı Düzenle</h1>
    <form action="{{ route('blog.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <label>Başlık</label>
        <input type="text" name="title" value="{{ $post->title }}" style="width:100%; padding:10px; margin:10px 0;" required>

        <label>İçerik</label>
        <textarea name="content" rows="10" style="width:100%; padding:10px; margin:10px 0;" required>{{ $post->content }}</textarea>

        <button type="submit" style="background: #ffc107; color: black; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Güncelle 🔄</button>
    </form>
@endsection
