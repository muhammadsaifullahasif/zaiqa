<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function index() {
        $items = Cart::instance('wishlist')->content();
        // return $items;
        return view('wishlist', compact('items'));
    }

    public function add_to_wishlist(Request $request) {
        Cart::instance('wishlist')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function update_wishlist_qty(Request $request) {
        $product = Cart::instance('wishlist')->get($request->rowId);
        if($request->operator == 'increase') {
            $qty = $product->qty + 1;
        } else if($request->operator == 'decrease') {
            $qty = $product->qty - 1;
        }

        Cart::instance('wishlist')->update($request->rowId, $qty);
        return response()->json(['status' => 'success']);
    }

    public function remove_wishlist_item($id) {
        Cart::instance('wishlist')->remove($id);
        return redirect()->back();
        // return response()->json(['status' => 'success']);
    }

    public function empty_wishlist() {
        Cart::instance('wishlist')->destroy();
        return redirect()->back();
    }

    public function move_to_cart($id) {
        $item = Cart::instance('wishlist')->get($id);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\Product');
        Cart::instance('wishlist')->remove($id);
        return redirect()->back();
    }
}
