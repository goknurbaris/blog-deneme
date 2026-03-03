@extends('layouts.app')

@section('title', 'Profilim')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="mb-10 flex items-center gap-4">
        <a href="{{ route('dashboard') }}" class="w-12 h-12 flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors shadow-sm text-slate-400 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400">
            <span class="text-xl">←</span>
        </a>
        <h1 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter italic">Profil Ayarları ⚙️</h1>
    </div>

    <div class="bg-white dark:bg-slate-800 p-8 sm:p-12 rounded-[3rem] shadow-sm border border-slate-100 dark:border-slate-700">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('patch')

            <div class="flex items-center gap-8">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-indigo-50 dark:border-indigo-900/30 shadow-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-5xl font-black text-indigo-300 dark:text-indigo-500">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    @endif
                </div>
                <div class="flex-1 w-full">
                    <label class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3">Yeni Fotoğraf Yükle</label>
                    <input type="file" name="avatar" accept="image/jpeg, image/png, image/jpg" class="w-full text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-indigo-50 dark:file:bg-indigo-900/50 file:text-indigo-700 dark:file:text-indigo-400 cursor-pointer">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3">Ad Soyad</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required class="w-full bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3">E-Posta</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required class="w-full bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 dark:text-white">
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl transition-all shadow-lg active:scale-95 uppercase tracking-widest text-xs mt-4">
                BİLGİLERİ KAYDET VE FOTOĞRAFI YÜKLE ✨
            </button>
        </form>
    </div>
</div>
@endsection
