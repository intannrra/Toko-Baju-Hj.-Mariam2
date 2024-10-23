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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // id sebagai primary key dan auto increment
            $table->string('user_id'); // Kolom user_id diisi manual, tipe string atau bisa integer jika ID numerik
            $table->string('product'); // Tabel produk jika ada, atau bisa disesuaikan
            $table->integer('total');
            $table->decimal('price', 15, 2); // Harga dengan presisi dua angka di belakang koma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
