<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRates extends Model
{
    protected $fillable = [
        'name',
        'zipcode',
        'rate',
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean'
    ];
}
