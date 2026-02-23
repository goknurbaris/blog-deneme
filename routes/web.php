<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

// Laravel'in otomatik eklediği üyelik rotaları (Login, Register, Logout)
Auth::routes();

// ==========================================
// 🟢 HERKESİN GÖREBİLECEĞİ SAYFALAR
// ==========================================
Route::get('/', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/detay/{slug}', [PostController::class, 'show'])->name('blog.show');
Auth::routes();

// Başarılı giriş/kayıt sonrası /home arayanları ana sayfaya yönlendir
Route::redirect('/home', '/');

// ==========================================
// 🔴 SADECE GİRİŞ YAPMIŞ ÜYELERİN GİREBİLECEĞİ SAYFALAR
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Yeni Yazı Ekleme
    Route::get('/blog/yaz', [PostController::class, 'create'])->name('blog.create');
    Route::post('/blog/yaz', [PostController::class, 'store'])->name('blog.store');

    // Düzenleme İşlemleri
    Route::get('/blog/{id}/duzenle', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [PostController::class, 'update'])->name('blog.update');

    // Silme İşlemi
    Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');

});
