@extends('layouts.app')

@section('title', 'Yeni Yazı Ekle')

@section('content')
    <h1>✍️ Yeni Blog Yazısı</h1>
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <label>Başlık</label>
        <input type="text" name="title" style="width:100%; padding:10px; margin:10px 0;" required>

        <label>İçerik</label>
        <textarea name="content" rows="10" style="width:100%; padding:10px; margin:10px 0;" required></textarea>

        <button type="submit" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Yayınla 🚀</button>
    </form>
@endsection
