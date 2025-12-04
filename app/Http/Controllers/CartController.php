<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Scopes\ParentProductScope;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() 
    {
        $items = Cart::instance('cart')->content();
        // Cart::instance('cart')->destroy();
        // return $items;
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request) 
    {
        try {
            // return dd($request->all());
            $product = Product::withoutGlobalScope(ParentProductScope::class)->findOrFail($request->variation_id);
            $price = $product->product_meta['price'] ?? 0;
            $vat = $product->product_meta['vat'] ?? 0;
            if ($request->quantity <= $product->product_meta['quantity']) {
                Cart::instance('cart')->add($request->product_id, $product->title, $request->quantity, $price, ['variation_id' => $request->variation_id, 'unit' => $product->product_meta['unit']], $vat)->associate('App\Models\Product');
                return redirect()->back()->with('success', 'Product has been added to cart!');
            } else {
                return redirect()->back()->with('error', 'Product quantity is not available!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update_cart_qty(Request $request) 
    {
        $product = Cart::instance('cart')->get($request->rowId);
        if($request->operator == 'increase') {
            $qty = $product->qty + 1;
        } else if($request->operator == 'decrease') {
            $qty = $product->qty - 1;
        }

        Cart::instance('cart')->update($request->rowId, $qty);
        return response()->json(['status' => 'success']);
    }

    public function remove_cart_item($id) 
    {
        Cart::instance('cart')->remove($id);
        return response()->json(['status' => 'success']);
    }

    public function empty_cart() 
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request) 
    {
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

    public function calculate_discount() 
    {
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

    public function remove_coupon_code() 
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return redirect()->back();
    }

    public function checkout($order_id = null)
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        // Generate time slots
        $timeSlots = [];
        $currentTime = now();

        // Round down to previous 30-minute interval
        $minutes = $currentTime->minute;
        $roundedMinutes = $minutes < 30 ? 0 : 30;
        $currentTime->minute = $roundedMinutes;
        $currentTime->second = 0;

        $endTime = now()->endOfDay();

        while ($currentTime <= $endTime) {
            $startTime = $currentTime->copy();
            $endTimeSlot = $currentTime->copy()->addMinutes(30);

            $timeSlots[] = $startTime->format('h:i A') . ' - ' . $endTimeSlot->format('h:i A');

            $currentTime->addMinutes(30);
        }

        $address = OrderAddress::where('customer_id', Auth::user()->id)->where('is_default', 1)->first();
        $items = Cart::instance('cart')->content();

        // Get order details if order_id is provided
        $order = null;
        if ($order_id) {
            $order = Order::find($order_id);
        }

        // return $order;

        return view('checkout', compact('address', 'items', 'timeSlots', 'order'));
    }

    public function place_order(Request $request) 
    {
        // dd($request->all());
        // $items = Cart::instance('cart')->content();
        // return $items;
        // die();

        $validate = [
            'name' => 'required|max:100',
            'phone' => 'required',
            'email' => 'required|email',
            'order_type' => 'required|in:delivery,pickup',
            'payment_gateway' => 'required|in:sumup,stripe,cod',
        ];
        if ($request->order_type == 'delivery') {
            $validate['delivery_time_slot'] = 'required';
            $validate['zipcode'] = 'required';
            $validate['city_town'] = 'required';
            $validate['address'] = 'required';
            $delivery_time = $request->delivery_time_slot;
            $pickup_time = '';
        } else if ($request->order_type == 'pickup') {
            $validate['pickup_time'] = 'required';
            $delivery_time = '';
            $pickup_time = $request->pickup_time;
        }
        $request->validate($validate);

        $currency = settings('default_currency', '');
        $currency_symbol = settings('currency_symbol', '');

        $user_id = Auth::user()->id;
        $address = OrderAddress::where('customer_id', $user_id)->where('is_default', 1)->first();

        if(!$address) {
            $address = new OrderAddress();
            $address->first_name = $request->name;
            $address->phone = $request->phone;
            $address->address_1 = $request->address;
            $address->city = $request->city_town;
            $address->zipcode = $request->zipcode;
            $address->customer_id = $user_id;
            $address->is_default = true;
            $address->save();
        }

        $order = new Order();
        $order->customer_id = $user_id;
        $order->address_id = $address->id;
        $order->order_total = floatval(str_replace(',', '', Cart::instance('cart')->total()));
        $order->order_type = $request->order_type;
        $order->save();

        $order->order_meta()->createMany([
            ['meta_key' => 'delivery_time', 'meta_value' => $delivery_time],
            ['meta_key' => 'pickup_time', 'meta_value' => $pickup_time],
        ]);

        foreach(Cart::instance('cart')->content() as $item) {
            // Get the actual variation product (the associated model)
            $product = Product::withoutGlobalScope(ParentProductScope::class)->find($item->options['variation_id']);
            // $variation = $item->model;
            // dd($variation);

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id; // Store the actual variation ID
            $orderItem->qty = $item->qty;
            $orderItem->save();

            $orderItem->order_item_meta()->createMany([
                ['meta_key' => 'title', 'meta_value' => $item->name],
                ['meta_key' => 'price', 'meta_value' => $item->price],
                ['meta_key' => 'vat', 'meta_value' => $item->tax],
                ['meta_key' => 'unit', 'meta_value' => $item->options['unit']],
                ['meta_key' => 'unitSymbol', 'meta_value' => $item->model->product_meta['unit']],
            ]);

            // Update the variation's quantity (not the parent product)
            $current_quantity = $product->product_meta['quantity'] ?? 0;
            $new_quantity = $current_quantity - $item->qty;
            $product->product_meta()->upsert(
                [
                    ['product_id' => $product->id, 'meta_key' => 'quantity', 'meta_value' => $new_quantity],
                ],
                ['product_id', 'meta_key'],
                ['meta_value']
            );
        }

        if($request->payment_gateway == 'sumup') {
            //
        } else if($request->payment_gateway == 'stripe') {
            $transaction = new Transaction();
            $transaction->customer_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->payment_gateway;
            $transaction->status = 'pending';
            $transaction->save();

            $transaction->transaction_meta()->createMany([
                ['meta_key' => 'currency', 'meta_value' => $currency],
                ['meta_key' => 'currency_symbol', 'meta_value' => $currency_symbol],
                ['meta_key' => 'subtotal', 'meta_value' => Cart::instance('cart')->subtotal()],
                ['meta_key' => 'discount', 'meta_value' => '0'],
                ['meta_key' => 'tax', 'meta_value' => Cart::instance('cart')->tax()],
                ['meta_key' => 'total', 'meta_value' => Cart::instance('cart')->total()],
            ]);
        } else if($request->payment_gateway == 'cod') {
            //
        }

        Cart::instance('cart')->destroy();

        Session::put('order_id', $order->id);
        return redirect()->route('checkout.index', $order->id);
        // return redirect()->route('order.confirmation');
    }

    public function order_confirmation(string $id) 
    {
        $order = Order::find($id);
        if($order) {
            // $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }
        return redirect()->route('cart.index');
    }
}
