<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionMeta extends Model
{
    protected $fillable = [
        'transaction_id',
        'meta_key',
        'meta_value',
    ];

    public $timestamps = false;
}
