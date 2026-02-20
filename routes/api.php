<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// TEST ROUTE
Route::get('/deneme', function () {
    return response()->json([
        ['id' => 1, 'baslik' => 'Laravel API', 'icerik' => 'Laravel ile her şey çok kolay!'],
        ['id' => 2, 'baslik' => 'Model Yapısı', 'icerik' => 'Post modelini başarıyla oluşturdun.']
    ]);
});

// POST ROUTELARI
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
