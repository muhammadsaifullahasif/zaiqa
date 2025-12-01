<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function orders() {
        $orders = Order::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();
        return view('user.orders', compact('orders'));
    }

    public function order_detail($id) {
        $order = Order::find($id);
        return view('user.order-detail', compact('order'));
    }

    public function order_cancel($id) {
        $order = Order::find($id);
        $order->status = 'canceled';
        $order->canceled_date = Carbon::now();
        $order->save();
        return redirect()->back()->with('success', 'Order canceled successfully!');
    }

    public function address() {
        $addresses = Address::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();
        return view('user.address', compact('addresses'));
    }

    public function address_add() {
        return view('user.address-add');
    }

    public function address_store(Request $request) {
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
        $address->user_id = Auth::user()->id;
        if(isset($request->isdefault)) {
            $address->isdefault = true;
        }
        $address->save();
        return redirect()->route('user.address')->with('success', 'Address has been successfully added!');
    }

    public function address_edit($id) {
        $address = Address::find($id);
        return view('user.address-edit', compact('address'));
    }

    public function address_update(Request $request, $id) {
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

        $address = Address::find($id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->zip = $request->zip;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->locality = $request->locality;
        $address->landmark = $request->landmark;
        $address->country = 'Pakistan';
        if(isset($request->isdefault)) {
            $address->isdefault = true;
        } else {
            $address->isdefault = false;
        }
        $address->save();
        return redirect()->route('user.address')->with('success', 'Address has been successfully updated!');
    }

    public function account_detail() {
        return view('user.account-detail');
    }

    public function account_detail_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.account.detail')->with('success', 'Account details has been successfully updated!');
    }

    public function account_wishlist() {
        $items = Cart::instance('wishlist')->content();
        return view('user.account-wishlist', compact('items'));
    }
}
