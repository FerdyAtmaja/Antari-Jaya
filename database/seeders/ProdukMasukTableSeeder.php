<?php

namespace Database\Seeders;

use App\Models\ProductIn;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukMasukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkMasukRecords = [
            [
                'kode_transaksi_masuk' => 1,
                'tanggal_masuk' => Carbon::now(),
                'id_produk' => 2,
                'jumlah_masuk' => 4,
                'harga' => 3000,
                'subtotal' => 12000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_masuk' => 2,
                'tanggal_masuk' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_masuk' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_masuk' => 3,
                'tanggal_masuk' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_masuk' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        ProductIn::insert($produkMasukRecords);
    }
}
