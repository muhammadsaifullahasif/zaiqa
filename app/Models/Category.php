<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function parent_category()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * Get subcategories of this category
     */
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * Get products count including subcategories
     * - For parent categories: count products directly in this category + all products in subcategories
     * - For subcategories: count products in this subcategory only
     */
    public function getProductsCountAttribute()
    {
        // if ($this->parent_id === null) {
        //     // This is a parent category
        //     // Count products that belong to this category and have no subcategory
        //     return Product::where('category_id', $this->id)
        //         ->whereNull('sub_category_id')
        //         ->whereNull('parent_id') // Only count main products, not variations
        //         ->count();
        // } else {
        //     // This is a subcategory
        //     // Count products that belong to this subcategory
        //     return Product::where('sub_category_id', $this->id)
        //         ->whereNull('parent_id') // Only count main products, not variations
        //         ->count();
        // }
        
        if ($this->parent_id === null) {
            // This is a parent category
            // Count products directly assigned to this category (without subcategory)
            $directProducts = Product::where('category_id', $this->id)
                ->whereNull('sub_category_id')
                ->whereNull('parent_id') // Only count main products, not variations
                ->count();

            // Get all subcategory IDs
            $subcategoryIds = $this->subcategories()->pluck('id')->toArray();

            // Count products in all subcategories
            $subcategoryProducts = 0;
            if (!empty($subcategoryIds)) {
                $subcategoryProducts = Product::whereIn('sub_category_id', $subcategoryIds)
                    ->whereNull('parent_id') // Only count main products, not variations
                    ->count();
            }

            return $directProducts + $subcategoryProducts;
        } else {
            // This is a subcategory
            // Count products that belong to this subcategory
            return Product::where('sub_category_id', $this->id)
                ->whereNull('parent_id') // Only count main products, not variations
                ->count();
        }
    }
}
