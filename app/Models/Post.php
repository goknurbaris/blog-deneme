<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // user_id eklendi!
    protected $fillable = ['user_id', 'title', 'slug', 'content', 'image'];

    // İlişki: Bu yazı bir Kullanıcıya (User) aittir.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
