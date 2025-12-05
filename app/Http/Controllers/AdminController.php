<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use App\Models\Order;
use App\Models\Slide;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        /*$year = now()->year;
        $orders = Order::orderby('created_at', 'DESC')->take(10)->get();
        $dashboardDatas = DB::select("SELECT SUM(total) AS TotalAmount,
                            SUM(if(status='ordered', total, 0)) AS TotalOrderedAmount,
                            SUM(if(status='delivered', total, 0)) AS TotalDeliveredAmount,
                            SUM(if(status='canceled', total, 0)) AS TotalCanceledAmount,
                            COUNT(*) AS Total,
                            SUM(if(status='ordered', 1, 0)) AS TotalOrdered,
                            SUM(if(status='delivered', 1, 0)) AS TotalDelivered,
                            SUM(if(status='canceled', 1, 0)) AS TotalCanceled
                            FROM orders");
        $monthlyDatas = DB::select("SELECT M.id AS MonthNo, M.name AS MonthName, 
                            IFNULL(D.TotalAmount, 0) AS TotalAmount, 
                            IFNULL(D.TotalOrderedAmount, 0) AS TotalOrderedAmount, 
                            IFNULL(D.TotalDeliveredAmount, 0) AS TotalDeliveredAmount, 
                            IFNULL(D.TotalCanceledAmount, 0) AS TotalCanceledAmount FROM month_names M 
                            LEFT JOIN(SELECT DATE_FORMAT(created_at,'%b') AS MonthName, 
                            MONTH(created_at) AS MonthNo, 
                            SUM(total) AS TotalAmount, 
                            SUM(IF(status='ordered', total, 0)) AS TotalOrderedAmount, 
                            SUM(IF(status='delivered', total, 0)) AS TotalDeliveredAmount, 
                            SUM(IF(status='canceled', total, 0)) AS TotalCanceledAmount 
                            FROM orders WHERE YEAR(created_at)=YEAR(NOW()) GROUP BY YEAR(created_at), MONTH(created_at), DATE_FORMAT(created_at, '%b') 
                            ORDER BY MONTH(created_at)) D ON D.MonthNo=M.id");
        
        $AmountM = implode(',', collect($monthlyDatas)->pluck('TotalAmount')->toArray());
        $OrderedAmountM = implode(',', collect($monthlyDatas)->pluck('TotalOrderedAmount')->toArray());
        $DeliveredAmountM = implode(',', collect($monthlyDatas)->pluck('TotalDeliveredAmount')->toArray());
        $CanceledAmountM = implode(',', collect($monthlyDatas)->pluck('TotalCanceledAmount')->toArray());

        $TotalAmount = collect($monthlyDatas)->sum('TotalAmount');
        $TotalOrderedAmount = collect($monthlyDatas)->sum('TotalOrderedAmount');
        $TotalDeliveredAmount = collect($monthlyDatas)->sum('TotalDeliveredAmount');
        $TotalCanceledAmount = collect($monthlyDatas)->sum('TotalCanceledAmount');
        // return $monthlyDatas;
        return view('admin.index', compact('orders', 'dashboardDatas', 'AmountM', 'OrderedAmountM', 'DeliveredAmountM', 'CanceledAmountM', 'TotalAmount', 'TotalOrderedAmount', 'TotalDeliveredAmount', 'TotalCanceledAmount'));*/
        return view('admin.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'LIKE', `%{$query}%`)->take(8)->get();
        return response()->json($results);
    }

    public function GenerateCategoryThumbnailsImage($image, $imageName, $destinationFolder)
    {
        $destinationPath = public_path('uploads/');
        $img = Image::read($image->path());
        $img->cover(124, 124, 'top');
        $img->resize(124, 124, function($constrait) {
            $constrait->aspectRatio();
        })->save($destinationPath . $destinationFolder . '/' . $imageName);
    }

    public function categories(Request $request)
    {
        $type_filter = $request->input('type_filter', '');
        $s = $request->input('s', '');

        $query = Category::query();

        // Apply search filter if search term is provided
        if (!empty($s)) {
            $query->where('name', 'like', '%' . $s . '%');
        }

        // Apply type filter
        if ($type_filter == 'only-parent') {
            $query->whereNull('parent_id');
        } else if ($type_filter == 'only-sub') {
            $query->whereNotNull('parent_id');
        }
        // If type_filter is 'all' or empty, no additional filter is needed

        $categories = $query->orderby('id', 'DESC')->paginate(10);

        // Check if it's an AJAX request
        if ($request->ajax()) {
            return view('admin.partials.categories-table', compact('categories'))->render();
        }

        return view('admin.categories', compact('categories', 'type_filter', 's'));
    }

    public function category_add()
    {
        $parent_categories = Category::orderBy('id', 'DESC')->where('parent_id', null)->get();
        return view('admin.category-add', compact('parent_categories'));
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:5120'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        if (!empty($request->parent_category)) {
            $category->parent_id = $request->parent_category;
        }
        $image = $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $this->GenerateCategoryThumbnailsImage($image, $file_name, 'categories');
        $category->image = $file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category has been added successfully!');
    }

    public function category_edit($id)
    {
        $category = Category::find($id);
        $parent_categories = Category::orderBy('id', 'DESC')->where('parent_id', null)->get();
        return view('admin.category-edit', compact('category', 'parent_categories'));
    }

    public function category_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'image' => 'mimes:png,jpg,jpeg|max:5120'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        if (!empty($request->parent_category)) {
            $category->parent_id = $request->parent_category;
        } else {
            $category->parent_id = null;
        }
        if($request->hasFile('image')) {
            if(File::exists(public_path('uploads/categories').'/'.$category->image)) {
                File::delete(public_path('uploads/categories').'/'.$category->image);
            }
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateCategoryThumbnailsImage($image, $file_name, 'categories');
            $category->image = $file_name;
        }
        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category has been updated successfully!');
    }

    public function category_delete($id)
    {
        $category = Category::find($id);
        if(File::exists(public_path('uploads/categories').'/'.$category->image)) {
            File::delete(public_path('uploads/categories').'/'.$category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('status', 'Category has been deleted successfully!');
    }

    public function sub_category_get(Request $request)
    {
        $request->validate([
            'parent_id' => 'required'
        ]);

        try {
            $sub_categories = Category::where('parent_id', $request->parent_id)->get();
            return response()->json([
                'success' => true,
                'data' => $sub_categories
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
        $sub_categories = Category::where('parent_id', $request->parent_id)->get();
        return response()->json($sub_categories);
    }

    /*public function categories_filter(string $type_filter, string $s)
    {
        if ($type_filter == 'all')
        {
            $categories = Category::whereLike('name', '%{$s}}%')->orderby('id', 'DESC')->paginate(10);
        } else if ($type_filter == 'only_parent')
        {
            $categories = Category::whereLike('name', '%{$s}%')->whereNull('parent_id')->orderby('id', 'DESC')->paginate(10);
        } else if ($type_filter == 'only_sub')
        {
            $categories = Category::whereLike('name', '%{$s}%')->whereNotNull('parent_id')->orderby('id', 'DESC')->paginate(10);
        }

        return view('admin.categories', compact('categories'));
    }*/

    public function orders()
    {
        $orders = Order::orderby('created_at', 'DESC')->paginate(10);
        // return $orders;
        return view('admin.orders', compact('orders'));
    }

    public function order_detail($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('admin.order-detail', compact('order'));
    }

    public function order_status_update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request->order_status;

        if($request->order_status === 'delivered') {
            $order->order_meta()->upsert(
                [
                    'meta_key' => 'delivered_date',
                    'meta_value' => Carbon::now(),
                ],
                ['meta_key'],
                ['meta_value']
            );
            $transaction = Transaction::where('order_id', $id)->first();
            $transaction->status = 'approved';
            $transaction->save();
        } else if($request->order_status === 'canceled') {
            $order->order_meta()->upsert(
                [
                    'meta_key' => 'canceled_date',
                    'meta_value' => Carbon::now(),
                ],
                ['meta_key'],
                ['meta_value']
            );
        }
        $order->save();

        return redirect()->back()->with('success', 'Status changed successfully!');
    }

    public function order_tracking()
    {
        return view('admin.order-tracking');
    }

    public function order_reports()
    {
        // Load all products including variations
        $products = Product::whereIn('type', ['simple', 'variable', 'variation'])
                          ->orderBy('title', 'asc')
                          ->get(['id', 'title', 'type']);

        // Load all categories
        $categories = Category::orderBy('name', 'asc')->get(['id', 'name']);

        // On initial load, show all orders with dummy data
        $reportData = $this->getDummyOrdersData();
        $reportType = 'orders'; // Default report type

        return view('admin.order-reports', compact('products', 'categories', 'reportData', 'reportType'));
    }

    public function generate_order_reports(Request $request)
    {
        // COMMENTED FOR DEMO - UNCOMMENT LATER FOR REAL DATA
        // $query = Order::with('orderItems.product.category');

        // // Apply Date Range Filter
        // if ($request->filled('start_date')) {
        //     $query->whereDate('created_at', '>=', $request->start_date);
        // }
        // if ($request->filled('end_date')) {
        //     $query->whereDate('created_at', '<=', $request->end_date);
        // }

        // // Apply Order Type Filter
        // if ($request->filled('order_type')) {
        //     $query->where('order_type', $request->order_type);
        // }

        // // Apply Order Status Filter
        // if ($request->filled('order_status')) {
        //     $query->where('status', $request->order_status);
        // }

        // // Apply Category Filter
        // if ($request->filled('categories')) {
        //     $query->whereHas('orderItems.product', function($q) use ($request) {
        //         $q->whereIn('category_id', $request->categories);
        //     });
        // }

        // // Apply Product Filter
        // if ($request->filled('products')) {
        //     $query->whereHas('orderItems', function($q) use ($request) {
        //         $q->whereIn('product_id', $request->products);
        //     });
        // }

        // $reportData = $query->orderBy('created_at', 'desc')->get();

        // DUMMY DATA FOR DEMO - REMOVE LATER
        $reportData = $this->getDummyOrdersData();

        // Load products and categories for filters
        $products = Product::whereIn('type', ['simple', 'variable', 'variation'])
                          ->orderBy('title', 'asc')
                          ->get(['id', 'title', 'type']);

        $categories = Category::orderBy('name', 'asc')->get(['id', 'name']);

        // Set default report type
        $reportType = 'orders';

        return view('admin.order-reports', compact('reportData', 'products', 'categories', 'reportType'));
    }

    private function getDummyOrdersData()
    {
        return collect([
                (object)[
                    'id' => 1001,
                    'name' => 'John Doe',
                    'created_at' => now()->subDays(5),
                    'subtotal' => 150.00,
                    'tax' => 15.00,
                    'total' => 165.00,
                    'status' => 'delivered',
                    'orderItems' => collect([
                        (object)['id' => 1, 'product_id' => 1, 'quantity' => 2],
                        (object)['id' => 2, 'product_id' => 2, 'quantity' => 1],
                    ])
                ],
                (object)[
                    'id' => 1002,
                    'name' => 'Jane Smith',
                    'created_at' => now()->subDays(3),
                    'subtotal' => 250.00,
                    'tax' => 25.00,
                    'total' => 275.00,
                    'status' => 'ordered',
                    'orderItems' => collect([
                        (object)['id' => 3, 'product_id' => 3, 'quantity' => 3],
                    ])
                ],
                (object)[
                    'id' => 1003,
                    'name' => 'Mike Johnson',
                    'created_at' => now()->subDays(2),
                    'subtotal' => 180.00,
                    'tax' => 18.00,
                    'total' => 198.00,
                    'status' => 'delivered',
                    'orderItems' => collect([
                        (object)['id' => 4, 'product_id' => 1, 'quantity' => 1],
                        (object)['id' => 5, 'product_id' => 4, 'quantity' => 2],
                    ])
                ],
                (object)[
                    'id' => 1004,
                    'name' => 'Sarah Williams',
                    'created_at' => now()->subDays(1),
                    'subtotal' => 320.00,
                    'tax' => 32.00,
                    'total' => 352.00,
                    'status' => 'canceled',
                    'orderItems' => collect([
                        (object)['id' => 6, 'product_id' => 2, 'quantity' => 4],
                    ])
                ],
                (object)[
                    'id' => 1005,
                    'name' => 'Robert Brown',
                    'created_at' => now(),
                    'subtotal' => 420.00,
                    'tax' => 42.00,
                    'total' => 462.00,
                    'status' => 'delivered',
                    'orderItems' => collect([
                        (object)['id' => 7, 'product_id' => 3, 'quantity' => 2],
                        (object)['id' => 8, 'product_id' => 5, 'quantity' => 1],
                    ])
                ],
            ]);
    }

    public function export_order_reports(Request $request)
    {
        // COMMENTED FOR DEMO - UNCOMMENT LATER FOR REAL DATA
        // Same filtering logic as generate_order_reports would go here

        // DUMMY DATA FOR DEMO - REMOVE LATER
        $reportData = $this->getDummyOrdersData();
        $reportType = 'orders'; // Default to orders for now

        $pdf = Pdf::loadView('admin.order-reports-pdf', compact('reportData', 'reportType'));

        $filename = 'orders-report-' . now()->format('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    public function slides(Request $request)
    {
        $query = Slide::query();

        // Search functionality
        if ($request->has('name') && $request->name != '') {
            $searchTerm = $request->name;
            $query->where(function($q) use ($searchTerm) {
                $q->where('tagline', 'like', '%' . $searchTerm . '%')
                  ->orWhere('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('subtitle', 'like', '%' . $searchTerm . '%')
                  ->orWhere('link', 'like', '%' . $searchTerm . '%');
            });
        }

        $slides = $query->orderby('created_at', 'DESC')->paginate(12);
        return view('admin.slides', compact('slides'));
    }

    public function slides_add()
    {
        return view('admin.slides-add');
    }

    public function slides_store(Request $request)
    {
        $request->validate([
            'tagline' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpq,jpeg|max:5120',
        ]);

        $slide = new Slide();
        $slide->tagline = $request->tagline;
        $slide->title = $request->title;
        $slide->subtitle = $request->subtitle;
        $slide->link = $request->link;
        $slide->status = $request->status;

        $image = $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $this->GenerateSlideThumbnailsImage($image, $file_name);
        $slide->image = $file_name;
        $slide->save();
        return redirect()->route('admin.slides')->with('success', 'Slide added successfully!');
    }

    public function GenerateSlideThumbnailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/slides');
        $img = Image::read($image->path());
        $img->cover(1280, 1280, 'top');
        $img->resize(1280, 1280, function($constrait) {
            $constrait->aspectRatio();
        })->save($destinationPath . '/' . $imageName);
    }

    public function slides_edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slides-edit', compact('slide'));
    }

    public function slides_update(Request $request, $id)
    {
        $request->validate([
            'tagline' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:5120',
        ]);

        $slide = Slide::find($id);
        $slide->tagline = $request->tagline;
        $slide->title = $request->title;
        $slide->subtitle = $request->subtitle;
        $slide->link = $request->link;
        $slide->status = $request->status;

        if($request->hasFile('image')) {
            if(File::exists(public_path('uploads/slides').'/'.$slide->image)) {
                File::delete(public_path('uploads/slides').'/'.$slide->image);
            }
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateSlideThumbnailsImage($image, $file_name);
            $slide->image = $file_name;
        }

        $slide->save();
        return redirect()->route('admin.slides')->with('success', 'Slide updated successfully!');
    }

    public function slide_delete($id)
    {
        $slide = Slide::find($id);
        if(File::exists(public_path('uploads/slides').'/'.$slide->image)) {
            File::delete(public_path('uploads/slides').'/'.$slide->image);
        }
        $slide->delete();
        return redirect()->route('admin.slides')->with('status', 'Slide has been deleted successfully!');
    }

    public function units(Request $request)
    {
        $query = Unit::query();

        // Search functionality
        if ($request->has('name') && $request->name != '') {
            $searchTerm = $request->name;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('symbol', 'like', '%' . $searchTerm . '%');
            });
        }

        $units = $query->orderby('id', 'DESC')->paginate(12);
        return view('admin.units', compact('units'));
    }

    public function unit_create()
    {
        return view('admin.unit-add');
    }

    public function unit_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);

        try {
            $unit = new Unit();
            $unit->name = $request->name;
            $unit->symbol = $request->symbol;
            $unit->save();

            return redirect()->route('admin.units')->with('status', 'Unit has been added successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function unit_edit(string $id)
    {
        $unit = Unit::findOrFail($id);
        return view('admin.unit-edit', compact('unit'));
    }

    public function unit_update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required'
        ]);

        try {
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->symbol = $request->symbol;
            $unit->save();

            return redirect()->route('admin.units')->with('status', 'Unit has been updated successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function unit_delete(string $id)
    {
        try {
            $unit = Unit::findOrFail($id);
            $unit->delete();

            return redirect()->route('admin.units')->with('status', 'Unit has been deleted successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function coupons()
    {
        $coupons = Coupon::orderby('expiry_date', 'DESC')->paginate(12);
        return view('admin.coupons', compact('coupons'));
    }

    public function coupon_add()
    {
        return view('admin.coupon-add');
    }

    public function coupon_store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();
        return redirect()->route('admin.coupons')->with('status', 'Coupon has been added successfully!');
    }

    public function coupon_edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon-edit', compact('coupon'));
    }

    public function coupon_update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$id,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->save();
        return redirect()->route('admin.coupons')->with('status', 'Coupon has been updated successfully!');
    }

    public function coupon_delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('status', 'Coupon has been deleted successfully!');
    }

    public function users(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->has('name') && $request->name != '') {
            $searchTerm = $request->name;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $users = $query->orderby('created_at', 'DESC')->paginate(12);
        return view('admin.users', compact('users'));
    }

    public function user_add()
    {
        return view('admin.user-add');
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'utype' => 'required',
        ]);

        try {
            $user = new User();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->utype = $request->utype;
            $user->save();

            $imageName = '';
            if ($request->has('image'))
            {
                $current_timestamp = Carbon::now()->timestamp . rand(10, 1000);
                $image = $request->file('image');
                $imageName = $current_timestamp . '.' . $image->extension();
                $this->GenerateUserThumbnailsImage($image, $imageName, 'users');
                $user->user_meta()->create([
                    'meta_key' => 'profile_image',
                    'meta_value' => $imageName
                ]);
            }

            $user->user_meta()->createMany([
                ['meta_key' => 'first_name', 'meta_value' => $request->first_name],
                ['meta_key' => 'last_name', 'meta_value' => $request->last_name],
                ['meta_key' => 'phone', 'meta_value' => $request->phone],
                ['meta_key' => 'address', 'meta_value' => $request->address],
                ['meta_key' => 'city', 'meta_value' => $request->city],
                ['meta_key' => 'state', 'meta_value' => $request->state],
                ['meta_key' => 'country', 'meta_value' => $request->country],
                ['meta_key' => 'zipcode', 'meta_value' => $request->zipcode],
            ]);

            return redirect()->route('admin.users')->with('status', 'User has been added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }

    public function user_update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'utype' => 'required',
        ]);

        try {
            $user = User::find($id);
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->utype = $request->utype;
            $user->save();

            if ($request->has('image'))
            {
                $current_timestamp = Carbon::now()->timestamp . rand(10, 1000);
                $image = $request->file('image');
                $imageName = $current_timestamp . '.' . $image->extension();
                $this->GenerateUserThumbnailsImage($image, $imageName, 'users');
                // $user->user_meta()->where('meta_key', 'profile_image')->update([
                //     'meta_value' => $imageName
                // ]);
                $user->user_meta()->upsert(
                    [
                        ['meta_key' => 'profile_image', 'meta_value' => $imageName],
                    ],
                    ['meta_key'],
                    ['meta_value']
                );
            }

            $user->user_meta()->upsert([
                    ['meta_key' => 'first_name', 'meta_value' => $request->first_name],
                    ['meta_key' => 'last_name', 'meta_value' => $request->last_name],
                    ['meta_key' => 'phone', 'meta_value' => $request->phone],
                    ['meta_key' => 'address', 'meta_value' => $request->address],
                    ['meta_key' => 'city', 'meta_value' => $request->city],
                    ['meta_key' => 'state', 'meta_value' => $request->state],
                    ['meta_key' => 'country', 'meta_value' => $request->country],
                    ['meta_key' => 'zipcode', 'meta_value' => $request->zipcode],
                ], 
                ['meta_key'], 
                ['meta_value']
            );

            return redirect()->back()->with('status', 'User has been updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function user_destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('status', 'User has been deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users')->with('status', 'User has been deleted successfully!');
    }

    public function GenerateUserThumbnailsImage($image, $imageName, $destinationFolder)
    {
        $destinationPath = public_path('uploads/');
        $img = Image::read($image->path());
        $img->cover(124, 124, 'top');
        $img->resize(124, 124, function($constrait) {
            $constrait->aspectRatio();
        })->save($destinationPath . $destinationFolder . '/' . $imageName);
    }

    public function setting()
    {
        return view('admin.setting');
    }
}
