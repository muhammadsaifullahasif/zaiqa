<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::where('status', '1')->take(3)->get();
        $categories = Category::orderby('created_at', 'DESC')->get();
        // $sProducts = Product::whereNotNull('sale_price')->where('sale_price', '!=', '')->inRandomOrder()->take(8)->get();
        $fProducts = Product::whereNull('parent_id')->where('is_featured', 1)->take(8)->get();
        // Get top selling products
        $topSellingProducts = Product::whereNull('parent_id')
            ->select('products.*')
            ->selectRaw('(
                SELECT COALESCE(SUM(order_items.qty), 0)
                FROM order_items
                WHERE order_items.product_id = products.id
                OR order_items.product_id IN (
                    SELECT id FROM products AS variations WHERE variations.parent_id = products.id
                )
            ) as total_sold')
            ->orderByDesc('total_sold')
            ->limit(8)
            ->get();
        // return $slides;
        return view('index', compact('slides', 'categories', 'fProducts', 'topSellingProducts'));
        // return view('index', compact('slides', 'categories', 'sProducts', 'fProducts'));
    }

    public function contact_index() {
        return view('contact');
    }

    public function contact_store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;
        $contact->save();
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $results = Product::where('name', 'LIKE', `%{$query}%`)->take(8)->get();
        return response()->json($results);
    }
}
