<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $appends = ['transaction_meta'];

    public function transaction_meta()
    {
        return $this->hasMany(TransactionMeta::class);
    }

    public function getTransactionMetaAttribute() {
        return $this->transaction_meta()
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            });
    }
}
