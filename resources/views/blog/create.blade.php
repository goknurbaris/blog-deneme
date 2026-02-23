@extends('layouts.app')

@section('title', 'Yeni Yazı Ekle')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mt-6">
    <div class="border-b border-gray-100 pb-5 mb-8">
        <h1 class="text-3xl font-bold text-gray-900">✨ Yeni Yazı Ekle</h1>
        <p class="text-gray-500 mt-2">Düşüncelerini dünyayla paylaşmaya başla.</p>
    </div>

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Yazı Başlığı</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm"
                   placeholder="Harika bir başlık düşün..." required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">İçerik</label>
            <textarea id="editor" name="content" placeholder="Nelerden bahsetmek istersin?">{{ old('content') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kapak Resmi (Opsiyonel)</label>
            <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition cursor-pointer">
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
            <a href="{{ route('blog.index') }}" class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition shadow-sm">İptal Et</a>
            <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition shadow-sm">
                Yazıyı Yayınla
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ]
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
