<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id();
        $table->string('id_pesanan');
        $table->string('id_karyawan');
        $table->string('id_pembeli');
        $table->string('id_transaksi');
        $table->decimal('total_harga', 15, 2);
        $table->date('tanggal_transaksi');
        $table->string('nama_barang');
        $table->timestamps();
    });
}

};
