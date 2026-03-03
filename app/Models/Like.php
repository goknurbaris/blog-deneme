<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Veritabanına yazılmasına izin verilen alanlar
    protected $fillable = ['user_id', 'post_id'];
}
