@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mt-6">
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-80 sm:h-96 object-cover" alt="{{ $post->title }}">
    @endif

    <div class="p-8 sm:p-12">
        <div class="flex flex-wrap items-center text-sm text-gray-500 mb-6 gap-3">
            <span class="font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">
                👤 {{ $post->user->name }}
            </span>
            <span>•</span>
            <span class="flex items-center">📅 {{ $post->created_at->format('d.m.Y') }}</span>
            <span>•</span>
            <span class="flex items-center">⏱️ {{ $post->created_at->diffForHumans() }}</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mb-8 leading-tight">
            {{ $post->title }}
        </h1>

        <div class="prose prose-lg prose-indigo max-w-none text-gray-700 mb-12">
            {!! $post->content !!}
        </div>

        <div class="border-t border-gray-100 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('blog.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium transition flex items-center group">
                <span class="mr-2 group-hover:-translate-x-1 transition-transform">&larr;</span> Listeye Dön
            </a>

            @if(auth()->check() && auth()->id() === $post->user_id)
                <div class="flex space-x-3 w-full sm:w-auto">
                    <a href="{{ route('blog.edit', $post->id) }}" class="flex-1 sm:flex-none text-center bg-amber-100 text-amber-700 px-5 py-2.5 rounded-lg font-medium hover:bg-amber-200 transition">
                        Düzenle
                    </a>
                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline flex-1 sm:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-center bg-red-100 text-red-700 px-5 py-2.5 rounded-lg font-medium hover:bg-red-200 transition" onclick="return confirm('Silmek istediğine emin misin?')">
                            Sil
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
