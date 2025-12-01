<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        $items = Cart::instance('cart')->content();
        // return $items;
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request) {
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function update_cart_qty(Request $request) {
        $product = Cart::instance('cart')->get($request->rowId);
        if($request->operator == 'increase') {
            $qty = $product->qty + 1;
        } else if($request->operator == 'decrease') {
            $qty = $product->qty - 1;
        }

        Cart::instance('cart')->update($request->rowId, $qty);
        return response()->json(['status' => 'success']);
    }

    public function remove_cart_item($id) {
        Cart::instance('cart')->remove($id);
        return response()->json(['status' => 'success']);
    }

    public function empty_cart() {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request) {
        $coupon_code = $request->coupon_code;
        if(isset($coupon_code)) {
            $coupon = Coupon::where('code', $coupon_code)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
            if($coupon) {
                Session::put('coupon', [
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'cart_value' => $coupon->cart_value
                ]);
                $this->calculate_discount();
                return redirect()->back()->with('success', 'Coupon has been applied!');
            } else {
                return redirect()->back()->with('error', 'Invalid coupon code!');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid coupon code!');
        }
    }

    public function calculate_discount() {
        $discount = 0;
        if(Session::has('coupon')) {
            if(Session::get('coupon')['type'] == 'fixed') {
                $discount = Session::get('coupon')['value'];
            } else {
                $discount = (Cart::instance('cart')->subtotal() * Session::get('coupon')['value']) / 100;
            }

            $discounted_subtotal = Cart::instance('cart')->subtotal() - $discount;
            $discounted_tax = ($discounted_subtotal * config('cart.tax')) / 100;
            $total = $discounted_subtotal + $discounted_tax;

            Session::put('discounts',[
                'discount' => number_format(floatval($discount), 2, '.', ''),
                'subtotal' => number_format(floatval($discounted_subtotal), 2, '.', ''),
                'tax' => number_format(floatval($discounted_tax), 2, '.', ''),
                'total' => number_format(floatval($total), 2, '.', '')
            ]);
        }
    }

    public function remove_coupon_code() {
        Session::forget('coupon');
        Session::forget('discounts');
        return redirect()->back();
    }

    public function checkout() {
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $address = Address::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
        $items = Cart::instance('cart')->content();
        return view('checkout', compact('address', 'items'));
    }

    public function place_order(Request $request) {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->where('isdefault', 1)->first();

        if(!$address) {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:10',
                'zip' => 'required|numeric|digits:5',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required',
            ]);

            $address = new Address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = $request->landmark;
            $address->country = 'Pakistan';
            $address->user_id = $user_id;
            $address->isdefault = true;
            $address->save();
        }

        $order = new Order();
        $order->user_id = $user_id;
        $order->subtotal = Session::has('discounts') ? Session::get('discounts')['subtotal'] : Cart::instance('cart')->subtotal();
        $order->discount = Session::has('discounts') ? Session::get('discounts')['discount'] : 0;
        $order->tax = Session::has('discounts') ? Session::get('discounts')['tax'] : Cart::instance('cart')->tax();
        $order->total = Session::has('discounts') ? Session::get('discounts')['total'] : Cart::instance('cart')->total();
        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->locality = $address->locality;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->landmark = $address->landmark;
        $order->zip = $address->zip;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($request->mode == 'card') {
            //
        } else if($request->mode == 'paypal') {
            //
        } else if($request->mode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = 'pending';
            $transaction->save();
        }

        Cart::instance('cart')->destroy();
        Session::forget('coupons');
        Session::forget('discounts');

        Session::put('order_id', $order->id);
        return redirect()->route('order.confirmation');
    }

    public function order_confirmation() {
        if(Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }
        return redirect()->route('cart.index');
    }
}
