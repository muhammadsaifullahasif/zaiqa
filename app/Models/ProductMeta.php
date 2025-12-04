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

    /**
     * Convert a collection of ProductMeta to key-value pairs
     *
     * @param \Illuminate\Support\Collection $collection
     * @return \Illuminate\Support\Collection
     */
    public static function toKeyValue($collection)
    {
        return $collection->mapWithKeys(function ($item) {
            return [$item->meta_key => $item->meta_value];
        });
    }
}
