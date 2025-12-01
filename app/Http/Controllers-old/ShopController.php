<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function index(Request $request) {

        $size = $request->page_size ? $request->page_size : 12;
        $orderBy = $request->orderBy ? $request->orderBy : '-1';
        $filter_brands = $request->brands;
        $filter_category = $request->category ? $request->category : '';
        $min_price = $request->min_price ? $request->min_price : 1;
        $max_price = $request->max_price ? $request->max_price : 999999999;
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
        $brands = Brand::withCount(['products' => function($query) use($filter_category){
            $query->where('category_id', $filter_category)->orWhereRaw("'".$filter_category."'=''");
        }])->orderby('name', 'ASC')->get();
        $categories = Category::orderby('name', 'ASC')->get();
        $products = Product::where(function($query) use($filter_brands){
            $query->whereIn('brand_id', explode(',', $filter_brands))->orWhereRaw("'".$filter_brands."'=''");
        })->where(function($query) use($filter_category){
            $query->where('category_id', $filter_category)->orWhereRaw("'".$filter_category."'=''");
        })->where(function($query) use($min_price, $max_price){
            $query->whereBetween('regular_price', [$min_price, $max_price])->orWhereBetween('sale_price', [$min_price, $max_price]);
        })->orderby($column, $order)->paginate($size);
        // return $products;
        // $minPrice = $products->first()->min_price; // Min price is the same for all rows
        // $maxPrice = $products->first()->max_price; // Max price is the same for all rows
        // return $maxPrice;
        return view('shop', compact('products', 'size', 'orderBy', 'categories', 'brands', 'filter_category', 'filter_brands', 'min_price', 'max_price'));
    }

    public function product_detail($product_slug) {
        $product = Product::where('slug', $product_slug)->first();
        $rproducts = Product::where('slug', '<>', $product_slug)->get()->take(8);
        return view('product-detail', compact('product', 'rproducts'));
    }
}
