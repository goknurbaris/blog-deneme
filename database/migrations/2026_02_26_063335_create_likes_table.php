<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('likes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Beğenen kişi
        $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Beğenilen yazı
        $table->timestamps();

        // Bir kişi bir yazıyı sadece BİR KEZ beğenebilsin diye önlem:
        $table->unique(['user_id', 'post_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
