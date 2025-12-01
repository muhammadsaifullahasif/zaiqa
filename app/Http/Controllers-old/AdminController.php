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
use App\Models\Transaction;
use Illuminate\Support\Str;
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

        if ($type_filter == 'all')
        {
            $categories = Category::where('name', 'like', '%' . $s . '%')->orderby('id', 'DESC')->paginate(10);
        } else if ($type_filter == 'only-parent')
        {
            $categories = Category::where('name', 'like', '%' . $s . '%')->whereNull('parent_id')->orderby('id', 'DESC')->paginate(10);
        } else if ($type_filter == 'only-sub')
        {
            $categories = Category::where('name', 'like', '%' . $s . '%')->whereNotNull('parent_id')->orderby('id', 'DESC')->paginate(10);
        } else
        {
            $categories = Category::orderby('id', 'DESC')->paginate(10);
        }

        // Check if it's an AJAX request
        if ($request->ajax()) {
            return view('admin.partials.categories-table', compact('categories'))->render();
        }

        return view('admin.categories', compact('categories', 'type_filter', 's'));
    }

    public function category_add()
    {
        $parent_categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category-add', compact('parent_categories'));
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
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
        $parent_categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category-edit', compact('category', 'parent_categories'));
    }

    public function category_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'image' => 'mimes:png,jpg,jpeg|max:2048'
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

    public function products()
    {
        $products = Product::whereNull('parent_id')->orderby('created_at', 'DESC')->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function product_add()
    {
        $categories = Category::select('id', 'name')->whereNull('parent_id')->orderby('name')->get();
        $units = Unit::select('id', 'name', 'symbol')->orderby('name')->get();
        return view('admin.product-add', compact('categories', 'units'));
    }

    public function product_store(Request $request)
    {
        $validation_rules = array(
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'is_variations' => 'required',
        );

        // if (isset($request->sub_category_id)) {
        //     $category_id = $request->sub_category_id;
        // }

        if ($request->is_variations == 'no') {
            $validation_rules['regular_price'] = 'required';
            $validation_rules['SKU'] = 'required';
            $validation_rules['quantity'] = 'required';
            $validation_rules['stock_status'] = 'required';
        }
        // $request->validate($validation_rules);
        
        $product = new Product();
        $product->title = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if (isset($request->sub_category_id)) {
            $product->sub_category_id = $request->sub_category_id;
        }
        // $product->type = 'simple';
        if ($request->is_variations == 'no') {
            $product->status = 'publish';
        } else {
            $product->type = 'variable';
        }
        $product->save();
        if ($request->is_variations == 'no') {
            $product->product_meta()->createMany([
                [
                    'meta_key' => 'featured',
                    'meta_value' => $request->featured
                ],
                [
                    'meta_key' => 'sale_price',
                    'meta_value' => $request->sale_price
                ],
                [
                    'meta_key' => 'price',
                    'meta_value' => $request->sale_price ? $request->sale_price : $request->regular_price
                ],
                [
                    'meta_key' => 'sale_start_date',
                    'meta_value' => ''
                ],
                [
                    'meta_key' => 'sale_end_date',
                    'meta_value' => ''
                ],
                [
                    'meta_key' => 'SKU',
                    'meta_value' => $request->SKU
                ],
                [
                    'meta_key' => 'stock_status',
                    'meta_value' => $request->stock_status
                ],
                [
                    'meta_key' => 'quantity',
                    'meta_value' => $request->quantity
                ]
            ]);
        } else {
            $variation_attributes = [];
            $groups = explode('|', $request->variation_attributes);
            foreach($groups as $group) {
                [$key, $values] = array_map('trim', explode(':', $group));
                $variation_attributes[$key] = array_map('trim', explode(',', $values));
            }
            $product->product_meta()->create([
                'meta_key' => 'variation_attributes',
                'meta_value' => json_encode($variation_attributes)
            ]);
        }

        $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            $product->product_meta()->create([
                'meta_key' => 'thumbnail',
                'meta_value' => $imageName
            ]);
        }

        $gallery_arr = array();
        $gallery_images = '';
        $counter = 1;

        if($request->hasFile('images')) {
            $allowFileExtensions = ['png', 'jpg', 'jpeg'];
            $files = $request->file('images');
            foreach($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowFileExtensions);
                if($gcheck) {
                    $gFileName = $current_timestamp . '-' . $counter . '.' . $gextension;
                    $this->GenerateProductThumbnailImage($file, $gFileName);
                    array_push($gallery_arr, $gFileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }
        $product->product_meta()->create([
            'meta_key' => 'gallery',
            'meta_value' => $gallery_images
        ]);
        return redirect()->route('admin.product.edit', $product->id)->with('status', 'Product has been added successfully!');
    }

    public function GenerateProductThumbnailImage($image, $imageName)
    {
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->path());
        $img->cover(540, 689, 'top');
        $img->resize(540, 689, function($constrait) {
            $constrait->aspectRatio();
        })->save($destinationPath . '/' . $imageName);

        $img->resize(104, 104, function($constrait) {
            $constrait->aspectRatio();
        })->save($destinationPathThumbnail . '/' . $imageName);
    }

    public function product_edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->whereNull('parent_id')->orderby('name')->get();
        $product_variations = Product::where('parent_id', $product->id)->get();
        // return $product_variations;
        return view('admin.product-edit', compact('product', 'categories', 'product_variations'));
    }

    public function product_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$id,
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ]);

        // dd($request);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->slug);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        // Handle variation attributes update for variable products
        if ($product->type === 'variable' && $request->has('variation_attributes')) {
            // Update the variation_attributes in product meta
            $new_variation_attributes = [];
            $groups = explode('|', $request->variation_attributes);
            foreach($groups as $group) {
                [$key, $values] = array_map('trim', explode(':', $group));
                $new_variation_attributes[$key] = array_map('trim', explode(',', $values));
            }
            
            // Get old variation attributes BEFORE updating (important!)
            $old_variation_attributes = [];
            $old_attributes_meta = $product->product_meta()->where('meta_key', 'variation_attributes')->first();
            if ($old_attributes_meta) {
                $old_variation_attributes = json_decode($old_attributes_meta->meta_value, true);
            }
            
            // Get existing variations
            $existing_variations = Product::where('parent_id', $product->id)->get();
            
            // Determine which attributes were removed (entire attribute keys)
            $old_attribute_keys = is_array($old_variation_attributes) ? array_keys($old_variation_attributes) : [];
            $new_attribute_keys = array_keys($new_variation_attributes);
            $removed_attributes = array_diff($old_attribute_keys, $new_attribute_keys);
            
            // Determine which attribute VALUES were removed within existing attributes
            $removed_attribute_values = [];
            foreach ($old_attribute_keys as $attr_key) {
                if (isset($new_variation_attributes[$attr_key])) {
                    // Attribute still exists, check for removed values
                    $old_values = is_array($old_variation_attributes[$attr_key]) 
                        ? array_map('strtolower', $old_variation_attributes[$attr_key]) 
                        : [];
                    $new_values = array_map('strtolower', $new_variation_attributes[$attr_key]);
                    $removed_values = array_diff($old_values, $new_values);
                    
                    if (!empty($removed_values)) {
                        $removed_attribute_values[$attr_key] = $removed_values;
                    }
                }
            }
            
            // Check if any attributes or values were removed
            if (!empty($removed_attributes) || !empty($removed_attribute_values)) {
                foreach ($existing_variations as $variation) {
                    $should_delete = false;
                    
                    // Check 1: If variation has a removed attribute (entire attribute removed)
                    foreach ($removed_attributes as $removed_attr) {
                        $meta_key = 'pa_' . strtolower($removed_attr);
                        // Check if this variation has the removed attribute
                        $has_removed_attribute = $variation->product_meta()->where('meta_key', $meta_key)->exists();
                        
                        if ($has_removed_attribute) {
                            $should_delete = true;
                            break;
                        }
                    }
                    
                    // Check 2: If variation has a removed attribute value (value removed from attribute)
                    if (!$should_delete && !empty($removed_attribute_values)) {
                        foreach ($removed_attribute_values as $attr_key => $removed_values) {
                            $meta_key = 'pa_' . strtolower($attr_key);
                            // Get the variation's value for this attribute
                            $variation_meta = $variation->product_meta()->where('meta_key', $meta_key)->first();
                            
                            if ($variation_meta && in_array(strtolower($variation_meta->meta_value), $removed_values)) {
                                // This variation has a removed value
                                $should_delete = true;
                                break;
                            }
                        }
                    }
                    
                    // Delete variation if it contains removed attributes or values
                    if ($should_delete) {
                        // Delete product meta entries first
                        $variation->product_meta()->delete();
                        // Then delete the variation
                        $variation->delete();
                    }
                }
            }
            
            // Now update the variation_attributes in product meta (after handling removals)
            $product->product_meta()->updateOrCreate(
                ['product_id' => $product->id, 'meta_key' => 'variation_attributes'],
                ['meta_value' => json_encode($new_variation_attributes)]
            );
        }

        $current_timestamp = Carbon::now()->timestamp;
        
        if($request->hasFile('image')) {
            if(File::exists(public_path('uploads/products').'/'.$product->image)) {
                File::delete(public_path('uploads/products').'/'.$product->image);
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->image)) {
                File::delete(public_path('uploads/products/thumbnails').'/'.$product->image);
            }
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailImage($image, $imageName);
            // $product->image = $imageName;
            $product->product_meta()->upsert(
                [
                    ['meta_key' => 'thumbnail', 'meta_value' => $imageName]
                ],
                ['product_id', 'meta_key'],
                ['meta_value']
            );
        }
        
        $gallery_arr = explode(',', $product->images);
        // $gallery_arr = array();
        $gallery_images = $product->images;
        $counter = count(explode(',', $product->images)) + 1;
        // $counter = 1;

        if($request->hasFile('images')) {
            $allowFileExtensions = ['png', 'jpg', 'jpeg'];
            $files = $request->file('images');
            foreach($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowFileExtensions);
                if($gcheck) {
                    $gFileName = $current_timestamp . '-' . $counter . '.' . $gextension;
                    $this->GenerateProductThumbnailImage($file, $gFileName);
                    array_push($gallery_arr, $gFileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }
        $product->product_meta()->upsert(
            [
                ['meta_key' => 'gallery', 'meta_value' => $gallery_images]
            ],
            ['product_id', 'meta_key'],
            ['meta_value']
        );

        if ($request->has('variation_id') && is_array($request->variation_id)) {
            foreach ($request->variation_id as $key => $id) {
                $variation = Product::find($id);
                if ($variation) {
                    $variation->product_meta()->upsert(
                        [
                            ['meta_key' => 'regular_price', 'meta_value' => $request->regular_price[$key]],
                            ['meta_key' => 'sale_price', 'meta_value' => $request->sale_price[$key]],
                            ['meta_key' => 'SKU', 'meta_value' => $request->SKU[$key]],
                            ['meta_key' => 'stock_status', 'meta_value' => $request->stock_status[$key]],
                            ['meta_key' => 'quantity', 'meta_value' => $request->quantity[$key]],
                        ],
                        ['product_id', 'meta_key'],
                        ['meta_value']
                    );
                }
            }
        }

        if ($request->has('attribute_variations') && is_array($request->attribute_variations)) {
            // Reorganize data: group by variation_id instead of by attribute
            $variations_data = [];

            foreach ($request->attribute_variations as $attribute_name => $variation_values) {
                foreach ($variation_values as $variation_id => $attribute_value) {
                    if (!isset($variations_data[$variation_id])) {
                        $variations_data[$variation_id] = [];
                    }
                    $variations_data[$variation_id][$attribute_name] = $attribute_value;
                }
            }

            // Track errors
            $errors = [];

            // Now validate and upsert for each variation
            foreach ($variations_data as $variation_id => $attributes) {
                $variation = Product::find($variation_id);
                if (!$variation) {
                    continue;
                }

                // Create variation key for this combination
                $variation_key = strtolower(implode('-', $attributes));

                // Check if this combination exists in other variations (excluding current one)
                $existingVariation = Product::where('parent_id', $variation->parent_id)
                    ->where('id', '!=', $variation_id)
                    ->whereHas('product_meta', function($q) use ($variation_key) {
                        $q->where('meta_key', 'variation_key')
                          ->where('meta_value', $variation_key);
                    })
                    ->first();

                if ($existingVariation) {
                    $errors[] = "Variation combination (" . implode(', ', $attributes) . ") already exists for variation ID: {$existingVariation->id}";
                    continue;
                }

                // Prepare upsert data for attributes
                $upsert_data = [];
                foreach ($attributes as $attr_name => $attr_value) {
                    $meta_key = 'pa_' . strtolower($attr_name);
                    $upsert_data[] = [
                        'product_id' => $variation_id,
                        'meta_key' => $meta_key,
                        'meta_value' => strtolower($attr_value)
                    ];
                }

                // Add variation_key to upsert data
                $upsert_data[] = [
                    'product_id' => $variation_id,
                    'meta_key' => 'variation_key',
                    'meta_value' => $variation_key
                ];

                if (!empty($upsert_data)) {
                    $variation->product_meta()->upsert(
                        $upsert_data,
                        ['product_id', 'meta_key'],
                        ['meta_value']
                    );
                }
            }

            // If there are errors, return with error messages
            if (!empty($errors)) {
                return redirect()->route('admin.product.edit', $product->id)
                    ->with('error', implode(' | ', $errors));
            }
        }

        return redirect()->route('admin.product.edit', $product->id)->with('status', 'Product has been updated successfully!');
    }

    public function product_delete($id)
    {
        $product = Product::find($id);
        if(File::exists(public_path('uploads/products').'/'.$product->image)) {
            File::delete(public_path('uploads/products').'/'.$product->image);
        }
        if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->image)) {
            File::delete(public_path('uploads/products/thumbnails').'/'.$product->image);
        }
        foreach(explode(',', $product->images) as $image) {
            if(File::exists(public_path('uploads/products').'/'.$image)) {
                File::delete(public_path('uploads/products').'/'.$image);
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$image)) {
                File::delete(public_path('uploads/products/thumbnails').'/'.$image);
            }
        }
        $product->delete();
        return redirect()->route('admin.products')->with('status', 'Product has been deleted successfully!');
    }

    public function add_variation(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'attributes' => 'required|array',
            ]);

            $product = Product::findOrFail($id);

            // Check if product is variable type
            if ($product->type !== 'variable') {
                return response()->json([
                    'success' => false,
                    'message' => 'This product is not a variable product.'
                ], 400);
            }

            // Get the attributes from request
            $attributes = $request->input('attributes');

            // Get existing variations from product_meta
            $productMeta = $product->product_meta;
            $variations = isset($productMeta['variation_attributes']) ? $productMeta['variation_attributes'] : [];

            // Create a unique key for this variation combination
            $variationKey = strtolower(implode('-', array_values($attributes)));

            // Check if this variation already exists
            $existingVariation = Product::where('parent_id', $product->id)
                ->whereHas('product_meta', function($q) use ($variationKey) {
                    $q->where('meta_key', 'variation_key')
                      ->where('meta_value', $variationKey);
                })
                ->first();

            if ($existingVariation) {
                return response()->json([
                    'success' => false,
                    'message' => 'This variation combination already exists.'
                ], 400);
            }

            $product_variation = new Product();
            $product_variation->title = $product->title;
            $product_variation->slug = $product->slug . '-' . strtolower($variationKey);
            $product_variation->parent_id = $product->id;
            $product_variation->category_id = $product->category_id;
            $product_variation->type = 'variation';
            $product_variation->status = $product->status;
            $product_variation->save();

            $product_variation->product_meta()->upsert(
                [
                    ['meta_key' => 'regular_price', 'meta_value' => ''],
                    ['meta_key' => 'sale_price', 'meta_value' => ''],
                    ['meta_key' => 'price', 'meta_value' => ''],
                    ['meta_key' => 'sale_start_date', 'meta_value' => ''],
                    ['meta_key' => 'sale_end_date', 'meta_value' => ''],
                    ['meta_key' => 'SKU', 'meta_value' => ''],
                    ['meta_key' => 'stock_status', 'meta_value' => ''],
                    ['meta_key' => 'quantity', 'meta_value' => ''],
                    ['meta_key' => 'featured', 'meta_value' => ''],
                    ['meta_key' => 'thumbnail', 'meta_value' => $product->product_meta['thumbnail']],
                    ['meta_key' => 'gallery', 'meta_value' => $product->product_meta['gallery']],
                    ['meta_key' => 'variation_key', 'meta_value' => strtolower($variationKey)]
                ],
                ['product_id', 'meta_key'],
                ['meta_value']
            );

            foreach ($attributes as $attributeName => $attributeValue) {
                $product_variation->product_meta()->upsert(
                    [
                        ['meta_key' => 'pa_' . strtolower($attributeName), 'meta_value' => strtolower($attributeValue)],
                    ],
                    ['product_id', 'meta_key'],
                    ['meta_value']
                );
            }

            return response()->json([
                'success' => true,
                'message' => 'Variation added successfully!',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_all_variations(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        try {
            $product = Product::findOrFail($id);

            // Check if product is variable type
            if ($product->type !== 'variable') {
                return response()->json([
                    'success' => false,
                    'message' => 'This product is not a variable product.'
                ], 400);
            }

            // Get the attributes from product meta
            $attributes = json_decode($product->product_meta['variation_attributes'], true);

            // Generate all possible variations
            $keys = array_keys($attributes);
            $values = array_values($attributes);

            $result = [[]];

            foreach ($values as $key => $vals) {
                $append = [];
                foreach ($result as $combination) {
                    foreach ($vals as $item) {
                        $combination[$keys[$key]] = $item;
                        $append[] = $combination;
                    }
                }
                $result = $append;
            }

            $createdCount = 0;
            $skippedCount = 0;

            // Create variations
            foreach ($result as $attributeCombination) {
                $variation_key = strtolower(implode('-', $attributeCombination));

                // Check if this variation already exists
                $existingVariation = Product::where('parent_id', $product->id)
                    ->whereHas('product_meta', function($q) use ($variation_key) {
                        $q->where('meta_key', 'variation_key')
                          ->where('meta_value', $variation_key);
                    })
                    ->first();

                if ($existingVariation) {
                    $skippedCount++;
                    continue;
                }

                // Create new variation
                $product_variation = new Product();
                $product_variation->title = $product->title;
                $product_variation->slug = $product->slug . '-' . $variation_key;
                $product_variation->parent_id = $product->id;
                $product_variation->category_id = $product->category_id;
                $product_variation->type = 'variation';
                $product_variation->status = $product->status;
                $product_variation->save();

                // Insert basic meta data
                $product_variation->product_meta()->upsert(
                    [
                        ['meta_key' => 'regular_price', 'meta_value' => ''],
                        ['meta_key' => 'sale_price', 'meta_value' => ''],
                        ['meta_key' => 'price', 'meta_value' => ''],
                        ['meta_key' => 'sale_start_date', 'meta_value' => ''],
                        ['meta_key' => 'sale_end_date', 'meta_value' => ''],
                        ['meta_key' => 'SKU', 'meta_value' => ''],
                        ['meta_key' => 'stock_status', 'meta_value' => ''],
                        ['meta_key' => 'quantity', 'meta_value' => ''],
                        ['meta_key' => 'featured', 'meta_value' => ''],
                        ['meta_key' => 'thumbnail', 'meta_value' => $product->product_meta['thumbnail']],
                        ['meta_key' => 'gallery', 'meta_value' => $product->product_meta['gallery']],
                        ['meta_key' => 'variation_key', 'meta_value' => $variation_key]
                    ],
                    ['product_id', 'meta_key'],
                    ['meta_value']
                );

                // Insert individual attribute meta data
                foreach ($attributeCombination as $attributeName => $attributeValue) {
                    $product_variation->product_meta()->upsert(
                        [
                            ['meta_key' => 'pa_' . strtolower($attributeName), 'meta_value' => strtolower($attributeValue)],
                        ],
                        ['product_id', 'meta_key'],
                        ['meta_value']
                    );
                }

                $createdCount++;
            }

            return response()->json([
                'success' => true,
                'message' => "Created {$createdCount} variation(s). Skipped {$skippedCount} existing variation(s).",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function remove_variation(Request $request, $id)
    {
        $request->validate([
            'variation_id' => 'required|exists:products,id',
            'variation_key' => 'required',
        ]);

        try {
            $product = Product::findOrFail($id);
            $variation = Product::findOrFail($request->variation_id);

            // Check if product is variable type
            if ($product->type !== 'variable') {
                return response()->json([
                    'success' => false,
                    'message' => 'This product is not a variable product.'
                ], 400);
            }

            // return $variation;

            // Check if variation exists
            if (!$variation || $variation->parent_id != $product->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Variation not found or does not belong to this product.'
                ], 400);
            }

            // Delete the variation
            $variation->delete();

            return response()->json([
                'success' => true,
                'message' => 'Variation removed successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if product variation exists with given attributes
     * 
     * @param int $productId
     * @param array $attributes ['size' => 'small', 'color' => 'red']
     * @return bool
     */
    function checkVariationExists($productId, array $attributes)
    {
        $query = Product::where('id', $productId);
        
        foreach ($attributes as $metaKey => $metaValue) {
            $query->whereHas('product_meta', function($q) use ($metaKey, $metaValue) {
                $q->where('meta_key', 'pa_' . strtolower($metaKey))
                ->where('meta_value', strtolower($metaValue));
            });
        }
        
        return $query->exists();
    }

    public function orders()
    {
        $orders = Order::orderby('created_at', 'DESC')->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function order_detail($id)
    {
        $order = Order::find($id);
        return view('admin.order-detail', compact('order'));
    }

    public function order_status_update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->order_status;

        if($request->order_status === 'delivered') {
            $order->delivered_date = Carbon::now();
            $transaction = Transaction::where('order_id', $id)->first();
            $transaction->status = 'approved';
            $transaction->save();
        } else if($request->order_status === 'canceled') {
            $order->canceled_date = Carbon::now();
        }
        $order->save();

        return redirect()->back()->with('success', 'Status changed successfully!');
    }

    public function order_tracking()
    {
        return view('admin.order-tracking');
    }

    public function slides()
    {
        $slides = Slide::orderby('created_at', 'DESC')->paginate(12);
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
            'image' => 'required|mimes:png,jpq,jpeg|max:2048',
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
        $img->cover(400, 690, 'top');
        $img->resize(400, 690, function($constrait) {
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
            'image' => 'mimes:png,jpg,jpeg|max:2048',
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

    public function units()
    {
        $units = Unit::orderby('id', 'DESC')->paginate(12);
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

    public function users()
    {
        $users = User::orderby('created_at', 'DESC')->paginate(12);
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
