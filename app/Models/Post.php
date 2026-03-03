<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Veritabanına kaydedilmesine izin verdiğimiz alanlar
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'image'
    ];

    // --- MEVCUT İLİŞKİLERİN ---

    // Yazının sahibi (Yazar)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Yazının kategorisi
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Yazının yorumları
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    // --- YENİ EKLEYECEĞİN KISIM (BEĞENİ SİSTEMİ) ---

    // 1. Yazının beğenileri (İlişki)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // 2. Kontrol: Şu anki kullanıcı bu yazıyı beğenmiş mi?
    // (Bu fonksiyonu butonu kırmızı mı beyaz mı yapalım diye sorarken kullanacağız)
    public function isLikedBy($user)
    {
        if (!$user) {
            return false; // Kullanıcı giriş yapmamışsa beğenmemiş sayılır
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

} // <-- Sınıf burada bitiyor. Her şey bu parantezden ÖNCE olmalı.
