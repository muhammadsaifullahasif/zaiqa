<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function index(Request $request) 
    {

        $s = $request->s ?? '';
        $size = $request->page_size ?? 12;
        $orderBy = $request->orderBy ?? '-1';
        $filter_category = $request->category ?? '';
        $filter_sub_category = $request->sub_category ?? '';
        $min_price = $request->min_price ?? 1;
        $max_price = $request->max_price ?? 999999999;
        $units = $request->units ?? [];
        $column = '';
        $order = '';
        switch ($orderBy) {
            case 'low-to-high':
                $column = 'regular_price';
                $order = 'ASC';
                break;
            case 'high-to-low':
                $column = 'regular_price';
                $order = 'DESC';
                break;
            case 'old-to-new':
                $column = 'created_at';
                $order = 'ASC';
                break;
            case 'new-to-old':
                $column = 'created_at';
                $order = 'DESC';
                break;
            default:
                $column = 'id';
                $order = 'DESC';
        }
        $categories = Category::orderby('name', 'ASC')->get();
        $products = Product::query();

        // Search query
        if ($request->has('s') && !empty($request->s)) {
            $products->where('title', 'like', '%' . $request->s . '%');
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $products->where('category_id', $request->category);
        }

        // Sub-category filter
        if ($request->has('sub_category') && !empty($request->sub_category)) {
            $products->where('sub_category_id', $request->sub_category);
        }

        // Price range filter
        if ($request->has('min_price') && !empty($request->min_price)) {
            $products->whereHas('product_meta', function($query) use ($request) {
                $query->where('meta_key', 'price')
                    ->where('meta_value', '>=', $request->min_price);
            });
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $products->whereHas('product_meta', function($query) use ($request) {
                $query->where('meta_key', 'price')
                    ->where('meta_value', '<=', $request->max_price);
            });
        }

        // Units filter (multiple selection)
        if ($request->has('units') && !empty($request->units)) {
            $units = is_array($request->units) ? $request->units : [$request->units];
            $products->whereHas('product_meta', function($query) use ($units) {
                $query->where('meta_key', 'unit')
                    ->whereIn('meta_value', $units);
            });
        }

        // Order by
        if ($request->has('orderBy') && !empty($request->orderBy)) {
            switch ($request->orderBy) {
                case 'price_asc':
                    $products->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                        ->where('product_metas.meta_key', 'price')
                        ->orderBy('product_metas.meta_value', 'asc')
                        ->select('products.*');
                    break;
                case 'price_desc':
                    $products->join('product_metas', 'products.id', '=', 'product_metas.product_id')
                        -where('product_metas.meta_key', 'price')
                        ->orderBy('product_metas.meta_value', 'desc')
                        ->select('products.*');
                    break;
                case 'name_asc':
                    $products->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $products->orderBy('title', 'desc');
                    break;
                case 'latest':
                    $products->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $products->orderBy('created_at', 'asc');
                    break;
            }
        }

        // Size (pagination)
        $size = $request->has('size') && !empty($request->size) ? $request->size : 12;
        $products = $products->paginate($size);

        // $products = Product::select('products.*')
        //     ->leftJoin('product_metas as pm_price', function ($join) {
        //         $join->on('products.id', '=', 'pm_price.product_id')
        //             ->where('pm_price.meta_key', 'price');
        //     })
        //     ->when($s, function($query, $s) {
        //         $query->where('title', 'like', '%{$s}%')
        //             ->orWhere('slug', 'like', '%{$s}%')
        //             ->orWhere('short_description', 'like', '%{$s}%')
        //             ->orWhere('description', 'like', '%{$s}%');
        //     })
        //     ->when($filter_category, function($query, $filter_category) {
        //         $query->where('category_id', $filter_category);
        //     })
        //     ->when($filter_sub_category, function($query, $filter_sub_category) {
        //         $query->where('sub_category_id', $filter_sub_category);
        //     })
        //     ->when($min_price || $max_price, function($query) use ($min_price, $max_price) {
        //         $query->whereBetween(DB::raw('CAST(pm_price.meta_value AS DECIMAL(10, 2))'), [$min_price, $max_price]);
        //     })
        //     ->when($units && count($units) > 0, function($query) use ($units) {
        //         // Assuming 'unit' is stored in product_meta
        //         $query->leftJoin('product_metas as pm_unit', function ($join) {
        //             $join->on('products.id', '=', 'pm_unit.product_id')
        //                 ->where('pm_unit.meta_key', 'unit');
        //         })
        //         ->whereIn('pm_unit.meta_value', $units);
        //     })
        //     ->with('variations.product_meta')
        //     ->orderby($column, $order)
        //     ->distinct() // important if multiple joins cause duplicates
        //     ->paginate($size);
        // $products = Product::with('variations.product_meta')
        //     ->where(function($query) use($filter_category){
        //         $query->where('category_id', $filter_category)->orWhereRaw("'".$filter_category."'=''");
        //     })->where(function($query) use($min_price, $max_price){
        //         $query->whereBetween('regular_price', [$min_price, $max_price])->orWhereBetween('sale_price', [$min_price, $max_price]);
        //     })->orderby($column, $order)->paginate($size);
        // $products = Product::where(function($query) use($filter_category){
        //     $query->where('category_id', $filter_category)->orWhereRaw("'".$filter_category."'=''");
        // })->where(function($query) use($min_price, $max_price){
        //     $query->whereBetween('regular_price', [$min_price, $max_price])->orWhereBetween('sale_price', [$min_price, $max_price]);
        // })->orderby($column, $order)->paginate($size);
        // return $products;
        // $minPrice = $products->first()->min_price; // Min price is the same for all rows
        // $maxPrice = $products->first()->max_price; // Max price is the same for all rows
        // return $maxPrice;
        return view('catalog', compact('products', 'size', 'orderBy', 'categories', 'filter_category', 'min_price', 'max_price'));
    }

    public function product_detail($product_slug) {
        $product = Product::with('variations')
            ->where('slug', $product_slug)->first();
        $rProducts = Product::where('slug', '<>', $product_slug)->whereNull('parent_id')->get()->take(8);
        // return $product;
        return view('single-product', compact('product', 'rProducts'));
    }
}
