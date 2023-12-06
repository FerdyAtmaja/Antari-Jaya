<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;
    protected $table = 'product_masuk';
    protected $primaryKey = 'kode_transaksi_masuk';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
