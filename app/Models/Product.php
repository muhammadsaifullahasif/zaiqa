<?php

namespace App\Models;

use App\Models\Scopes\ParentProductScope;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = ['product_meta'];

    protected $appends = ['variations_count']; // Ensures this is included in JSON

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new ParentProductScope);
    }

    public function product_meta() {
        return $this->hasMany(ProductMeta::class, 'product_id', 'id');
    }

    /**
     * Override attribute retrieval to transform product_meta
     */
    public function getAttribute($key)
    {
        // For product_meta, ensure relationship is loaded and transform it
        if ($key === 'product_meta') {
            // Load the relationship if not already loaded
            if (!$this->relationLoaded('product_meta')) {
                $this->load('product_meta');
            }

            $value = $this->getRelation('product_meta');

            // Transform to key-value pairs
            if ($value instanceof \Illuminate\Database\Eloquent\Collection) {
                return ProductMeta::toKeyValue($value);
            }

            return $value;
        }

        return parent::getAttribute($key);
    }

    /**
     * Override array conversion to include transformed product_meta
     */
    public function toArray()
    {
        $array = parent::toArray();

        // Ensure product_meta is transformed in array output
        if (isset($array['product_meta']) && is_array($array['product_meta'])) {
            // If it's already an array of meta objects, transform it
            if (isset($array['product_meta'][0]['meta_key'])) {
                $collection = collect($array['product_meta']);
                $array['product_meta'] = $collection->mapWithKeys(function ($item) {
                    return [$item['meta_key'] => $item['meta_value']];
                })->toArray();
            }
        }

        return $array;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category() {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function variations() {
        return $this->hasMany(Product::class, 'parent_id', 'id')
            ->withoutGlobalScope(ParentProductScope::class)
            ->with('product_meta');
    }

    // Accessor for variations
    // public function getVariationsAttribute()
    // {
    //     return $this->variations()
    //         ->get()
    //         ->map(function ($variation) {
    //             $variation->product_meta = $variation->getProductMetaAttribute(); // will use accessor
    //             unset($variation->variations);
    //             return $variation;
    //         });
    // }

    public function getVariationsCountAttribute() {
        return $this->variations()->count();
    }

    // Get regular price (single variation or simple product)
    public function getRegularPrice() {
        if ($this->type === 'variable' && $this->variations_count == 1) {
            $variation = $this->variations()->first();
            return $variation->product_meta['regular_price'] ?? 0;
        }
        return $this->product_meta['regular_price'] ?? 0;
    }

    // Get sale price (single variation or simple product)
    public function getSalePrice() {
        if ($this->type === 'variable' && $this->variations_count == 1) {
            $variation = $this->variations()->first();
            return $variation->product_meta['sale_price'] ?? 0;
        }
        return $this->product_meta['sale_price'] ?? 0;
    }

    // Get price (single variation or simple product)
    public function getPrice() {
        if ($this->type === 'variable' && $this->variations_count == 1) {
            $variation = $this->variations()->first();
            return $variation->product_meta['price'] ?? 0;
        }
        return $this->product_meta['price'] ?? 0;
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
        if ($this->type == 'variable') {
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

    /**
     * Check if the product is on sale
     * For variable products, checks if any variation ahs a sale price
     * For simple products, checks if it has a sale price set
     * 
     * @return bool
     */
    public function isOnSale()
    {
        if ($this->type === 'variable') {
            // For variable products, check if any variation has a sale price
            $hasSalePrice = $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'sale_price')
                ->where('product_metas.meta_value', '!=', '')
                ->where('product_metas.meta_value', '!=', '0')
                ->where('product_metas.meta_value', '!=', null)
                ->exists();

            return $hasSalePrice;
        }

        // For simple products, check if sale price exists and is not empty/zero
        $salePrice = $this->product_meta['sale_price'] ?? null;

        return !empty($salePrice) && $salePrice !== '0' && $salePrice > 0;
    }

    // Get min unit for variable products
    public function getMinUnit() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'unit')
                ->where('product_metas.meta_value', '!=', '')
                ->min('product_metas.meta_value');
        }
        return $this->product_meta['unit'] ?? 0;
    }

    // Get max unit for variable products
    public function getMaxUnit() {
        if ($this->type === 'variable') {
            return $this->variations()
                ->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                ->where('product_metas.meta_key', 'unit')
                ->where('product_metas.meta_value', '!=', '')
                ->max('product_metas.meta_value');
        }
        return $this->product_meta['unit'] ?? 0;
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
