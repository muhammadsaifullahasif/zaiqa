<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    protected $fillable = [
        'order_id',
        'meta_key',
        'meta_value',
    ];

    public $timestamps = false;
}
