<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'subtotal', 'discount', 'tax', 'total',
        'name', 'phone', 'locality', 'address', 'city',
        'state', 'country', 'zip', 'landmark',
        'status', 'delivered_date', 'canceled_date'
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items for the order
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the transaction for the order
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
