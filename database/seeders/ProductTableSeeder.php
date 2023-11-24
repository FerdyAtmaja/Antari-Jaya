<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesRecords = [
            [
                'id_produk' => 1,
                'nama_produk' => 'Mizone',
                'harga' => 5000,
                'stok' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_produk' => 2,
                'nama_produk' => 'Le Minerale',
                'harga' => 3000,
                'stok' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_produk' => 3,
                'nama_produk' => 'Aqua',
                'harga' => 3000,
                'stok' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Product::insert($rolesRecords);
    }
}
