<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ProductOut;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukKeluarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkKeluarRecords = [
            [
                'kode_transaksi_keluar' => 1,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 2,
                'jumlah_keluar' => 4,
                'harga' => 3000,
                'subtotal' => 12000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 2,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_keluar' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 3,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 4,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_keluar' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 5,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 6,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_keluar' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 7,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 8,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_keluar' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 9,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 10,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 11,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 1,
                'jumlah_keluar' => 4,
                'harga' => 5000,
                'subtotal' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode_transaksi_keluar' => 12,
                'tanggal_keluar' => Carbon::now(),
                'id_produk' => 3,
                'jumlah_keluar' => 5,
                'harga' => 3000,
                'subtotal' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        ProductOut::insert($produkKeluarRecords);
    }
}
