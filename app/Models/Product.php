<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['product_meta']; // Ensures this is included in JSON

    public function product_meta() {
        return $this->hasMany(ProductMeta::class, 'product_id', 'id');
    }

    public function getProductMetaAttribute() {
        return $this->product_meta()
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            });
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category() {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function variations() {
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }

    // Get min regular price for variable products
    public function getMinRegularPrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'regular_price')
                ->where('product_metas.meta_value', '!=', '')
                ->min('product_metas.meta_value');
        }
        return $this->product_meta['regular_price'] ?? 0;
    }

    // Get max regular price for variable products
    public function getMaxRegularPrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'regular_price')
                ->where('product_metas.meta_value', '!=', '')
                ->max('product_metas.meta_value');
        }
        return $this->product_meta['regular_price'] ?? 0;
    }

    // Get min sale price for variable products
    public function getMinSalePrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'sale_price')
                ->where('product_metas.meta_value', '!=', '')
                ->min('product_metas.meta_value');
        }
        return $this->product_meta['sale_price'] ?? 0;
    }

    // Get max sale price for variable products
    public function getMaxSalePrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'sale_price')
                ->where('product_metas.meta_value', '!=', '')
                ->max('product_metas.meta_value');
        }
        return $this->product_meta['sale_price'] ?? 0;
    }

    // Get min regular price for variable products
    public function getMinPrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'price')
                ->where('product_metas.meta_value', '!=', '')
                ->min('product_metas.meta_value');
        }
        return $this->product_meta['price'] ?? 0;
    }

    // Get max regular price for variable products
    public function getMaxPrice() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'price')
                ->where('product_metas.meta_value', '!=', '')
                ->max('product_metas.meta_value');
        }
        return $this->product_meta['price'] ?? 0;
    }

    // Get total quantity for variable products (sum of all variations)
    public function getTotalQuantity() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'quantity')
                ->where('product_metas.meta_value', '!=', '')
                ->sum('product_metas.meta_value');
        }
        return $this->product_meta['quantity'] ?? 0;
    }
}
