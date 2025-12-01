<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $fillable = ['product_id', 'meta_key', 'meta_value'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
