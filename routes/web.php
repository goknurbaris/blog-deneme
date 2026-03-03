<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. ANA SAYFA
Route::get('/', [PostController::class, 'index'])->name('blog.index');

// 2. GİRİŞ YAPANLAR İÇİN ÖZEL İŞLEMLER
Route::middleware(['auth'])->group(function () {

    // Dashboard (Panel)
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');

    // Yazı Ekleme
    Route::get('/blog/yaz', [PostController::class, 'create'])->name('blog.create');
    Route::post('/blog/yaz', [PostController::class, 'store'])->name('blog.store');

    // Yazı Düzenleme ve Silme
    Route::get('/blog/{id}/edit', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [PostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');

    // Etkileşimler (Beğeni ve Yorum)
    Route::post('/blog/{post}/like', [PostController::class, 'like'])->name('blog.like');
    Route::post('/blog/{id}/comment', [PostController::class, 'commentStore'])->name('comment.store');

    // 🚨 İŞTE SİLİNEN VE HATAYA SEBEP OLAN YER BURASI: Profil Rotaları 🚨
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. YAZI DETAY SAYFASI (En altta kalmalı)
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// Auth (Giriş/Çıkış) Rotaları
require __DIR__.'/auth.php';
