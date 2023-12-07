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
        Schema::create('produk_keluar', function (Blueprint $table) {
            $table->id('kode_transaksi_keluar');
            $table->dateTime('tanggal_keluar');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah_keluar');
            $table->decimal('harga');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_keluar');
    }
};
