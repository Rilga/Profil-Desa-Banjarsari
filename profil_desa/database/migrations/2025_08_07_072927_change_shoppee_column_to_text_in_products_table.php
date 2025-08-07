<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Mengubah kolom 'shoppee' menjadi tipe TEXT agar bisa menampung URL panjang
            $table->text('shoppee')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // (Opsional) Mengembalikan ke tipe string jika migrasi dibatalkan
            $table->string('shoppee')->nullable()->change();
        });
    }
};