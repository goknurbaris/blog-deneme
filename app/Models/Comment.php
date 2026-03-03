<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Mass Assignment (Toplu Veri Girişi) izni veriyoruz
    protected $fillable = [
        'post_id',
        'user_name',
        'content',
    ];

    /**
     * Yorumun ait olduğu yazıyı tanımlar.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
