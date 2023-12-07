<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    use HasFactory;
    protected $table = 'produk_keluar';
    protected $primaryKey = 'kode_transaksi_keluar';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
