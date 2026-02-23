@extends('layouts.app')

@section('title', 'Blog Yazılarım')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Son Yazılar</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($posts as $post)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden flex flex-col border border-gray-100">

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-52 object-cover">
            @else
                <div class="w-full h-52 bg-gray-200 flex items-center justify-center text-gray-400">
                    <span>Görsel Yok</span>
                </div>
            @endif

            <div class="p-6 flex-grow flex flex-col">
                <h2 class="text-xl font-bold text-gray-900 mb-2 truncate">
                    <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-indigo-600 transition-colors">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ Str::limit($post->content, 120) }}
                </p>

                <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
                    <div class="flex items-center space-x-2">
                        <span class="font-medium text-gray-700">👤 {{ $post->user->name }}</span>
                    </div>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>

                @if(auth()->check() && auth()->id() === $post->user_id)
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('blog.edit', $post->id) }}" class="text-xs font-semibold px-3 py-1 bg-amber-100 text-amber-700 rounded-md hover:bg-amber-200 transition">
                            Düzenle
                        </a>
                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-semibold px-3 py-1 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition" onclick="return confirm('Silmek istediğine emin misin?')">
                                Sil
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
            <p class="text-gray-500 text-lg mb-4">Henüz hiç yazı eklenmemiş.</p>
            <a href="{{ route('blog.create') }}" class="inline-block bg-indigo-600 text-white font-medium px-6 py-3 rounded-md hover:bg-indigo-700 transition">
                İlk Yazını Oluştur
            </a>
        </div>
    @endforelse
</div>
@endsection
