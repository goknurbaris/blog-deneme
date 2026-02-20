<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// 1. Ana Sayfa (Yazı Listesi)
Route::get('/', [PostController::class, 'index'])->name('blog.index');

// 2. Yeni Yazı Ekleme Sayfası (Form)
Route::get('/blog/yaz', [PostController::class, 'create'])->name('blog.create');

// 3. Formdan Gelen Veriyi Kaydetme
Route::post('/blog/yaz', [PostController::class, 'store'])->name('blog.store');
// Silme İşlemi (Post ID'sine göre)
Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');

// Düzenleme Sayfası (Formu gösterir)
Route::get('/blog/{id}/duzenle', [PostController::class, 'edit'])->name('blog.edit');

// Güncelleme İşlemi (Veritabanını günceller)
Route::put('/blog/{id}', [PostController::class, 'update'])->name('blog.update');
