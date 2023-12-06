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
        Schema::create('produk_masuk', function (Blueprint $table) {
            $table->id('kode_transaksi_masuk');
            $table->dateTime('tanggal_masuk');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah_masuk');
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
        Schema::dropIfExists('produk_masuk');
    }
};
