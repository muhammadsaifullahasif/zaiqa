<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_id', 'order_id', 'price', 'quantity'
    ];

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
