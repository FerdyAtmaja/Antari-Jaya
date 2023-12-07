<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $guarded = [];

    public function productsIn()
    {
        return $this->hasMany(ProductIn::class, 'id_product');
    }

    public function productsOut()
    {
        return $this->hasMany(ProductOut::class, 'id_product');
    }
}
