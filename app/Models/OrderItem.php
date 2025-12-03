<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_id', 'order_id', 'qty'
    ];

    public $timestamps = false;

    protected $appends = ['order_item_meta'];

    public function order_item_meta()
    {
        return $this->hasMany(OrderItemMeta::class);
    }

    public function getOrderItemMetaAttribute() {
        return $this->order_item_meta()
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            });
    }

    /**
     * Get the order that owns the order item
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product for the order item
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
