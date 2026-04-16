<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        // Yazılar tablosuna kategori_id ekliyoruz
        // onDelete('cascade'): Kategori silinirse, içindeki yazılar da silinsin demek.
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });
    }
};
