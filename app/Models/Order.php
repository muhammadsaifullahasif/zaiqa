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

    protected $with = ['transaction'];

    protected $appends = ['order_meta', 'order_items'];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_meta()
    {
        return $this->hasOne(OrderMeta::class);
    }

    /**
     * Get the order items for the order
     */
    public function order_items()
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

    public function getOrderMetaAttribute() {
        return $this->order_meta()
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            });
    }

    public function getOrderItemsAttribute() {
        return $this->order_items()->get();
    }
}
