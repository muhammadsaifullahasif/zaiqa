<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::whereNull('parent_id');

        // Search functionality
        if ($request->has('name') && $request->name != '') {
            $searchTerm = $request->name;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('sub_category', function($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        $products = $query->orderby('created_at', 'DESC')->paginate(10);
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->whereNull('parent_id')->orderby('name')->get();
        $units = Unit::select('id', 'name', 'symbol')->orderby('name')->get();
        return view('admin.product-add', compact('categories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the selected category has subcategories
        $hasSubCategories = Category::where('parent_id', $request->category_id)->exists();

        $validationRules = [
            'name' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5120',
            'unit' => 'required',
            'variations' => 'required|array',
            'variations.unit.*' => 'required|string',
            // 'variations.image.*' => 'required|mimes:png,jpg,jpeg|max:5120',
            'variations.SKU.*' => 'required|string',
            'variations.regular_price.*' => 'required|numeric',
            'variations.sale_price.*' => 'nullable|numeric',
            'variations.quantity.*' => 'required|integer',
        ];

        // Add sub_category_id validation if category has subcategories
        if ($hasSubCategories) {
            $validationRules['sub_category_id'] = 'required|exists:categories,id';
        }

        $request->validate($validationRules, [
            'sub_category_id.required' => 'The selected category has subcategories. Please select a subcategory.',
        ]);

        try {
            $product = new Product();
            $product->title = $request->name;
            $product->slug = $request->slug;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->is_featured = $request->featured;
            $product->category_id = $request->category_id;
            if($request->has('sub_category_id')) {
                $product->sub_category_id = $request->sub_category_id;
            }
            $product->type = 'variable';
            $product->status = 'publish';
            $product->save();

            $current_timestamp = Carbon::now()->timestamp . rand(10, 1000);

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $current_timestamp . '.' . $image->extension();
                $this->GenerateProductThumbnailImage($image, $imageName);
                $product->product_meta()->create([
                    'meta_key' => 'thumbnail',
                    'meta_value' => $imageName
                ]);
            }

            // Handle gallery images from Dropzone
            // Images come as comma-separated filenames (already uploaded via AJAX)
            $gallery_images = '';
            if($request->filled('images')) {
                // Images are already uploaded via Dropzone, just get the filenames
                $gallery_images = $request->images;
            }

            $product->product_meta()->createMany([
                ['meta_key' => 'gallery', 'meta_value' => $gallery_images],
                ['meta_key' => 'unit', 'meta_value' => $request->unit],
            ]);

            $variation_counter = 1;
            foreach($request->variations['unit'] as $index => $variation) {
                $product_variation = new Product();
                $product_variation->title = $request->name;
                $product_variation->slug = $request->slug . '-' . $request->variations['SKU'][$index];
                $product_variation->parent_id = $product->id;
                $product_variation->category_id = $request->category_id;
                if ($request->has('sub_category_id')) {
                    $product_variation->sub_category_id = $request->sub_category_id;
                }
                $product_variation->is_featured = $request->featured;
                $product_variation->type = 'variation';
                $product_variation->status = $product->status;
                $product_variation->save();

                $v_image = $request->variations['image'][$index];
                $v_imageName = $current_timestamp . '-variation-' . $variation_counter . '.' . $v_image->extension();
                $this->GenerateProductThumbnailImage($v_image, $v_imageName);

                $product_variation->product_meta()->createMany([
                    ['meta_key' => 'thumbnail', 'meta_value' => $v_imageName],
                    ['meta_key' => 'unit', 'meta_value' => $request->variations['unit'][$index]],
                    ['meta_key' => 'regular_price', 'meta_value' => $request->variations['regular_price'][$index]],
                    ['meta_key' => 'sale_price', 'meta_value' => $request->variations['sale_price'][$index] ?? ''],
                    ['meta_key' => 'price', 'meta_value' => $request->variations['sale_price'][$index] ?? $request->variations['regular_price'][$index]],
                    ['meta_key' => 'quantity', 'meta_value' => $request->variations['quantity'][$index]],
                    ['meta_key' => 'SKU', 'meta_value' => $request->variations['SKU'][$index]]
                ]);

                $variation_counter++;
            }

            return redirect()->route('products.index')->with('status', 'Product created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->whereNull('parent_id')->orderby('name')->get();
        $product_variations = Product::where('parent_id', $product->id)->get();
        $units = Unit::select('id', 'name', 'symbol')->orderby('name')->get();
        $sub_categories = Category::select('id', 'name')->where('parent_id', $product->category_id)->orderby('name')->get();
        // return $product_variations;
        return view('admin.product-edit', compact('product', 'categories', 'sub_categories', 'units', 'product_variations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Check if the selected category has subcategories
        $hasSubCategories = Category::where('parent_id', $request->category_id)->exists();

        $validationRules = [
            'name' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            // 'image' => 'required|mimes:png,jpg,jpeg|max:5120',
            'image' => 'mimes:png,jpg,jpeg|max:5120',
            'unit' => 'required',
            'variations' => 'required|array',
            'variations.unit.*' => 'required|string',
            // 'variations.image.*' => 'required|mimes:png,jpg,jpeg|max:5120',
            'variations.SKU.*' => 'required|string',
            'variations.regular_price.*' => 'required|numeric',
            'variations.sale_price.*' => 'nullable|numeric',
            'variations.quantity.*' => 'required|integer',
        ];

        // Add sub_category_id validation if category has subcategories
        if ($hasSubCategories) {
            $validationRules['sub_category_id'] = 'required|exists:categories,id';
        }

        $request->validate($validationRules, [
            'sub_category_id.required' => 'The selected category has subcategories. Please select a subcategory.',
        ]);

        try {
            $product = Product::find($id);
            $product->title = $request->name;
            $product->slug = $request->slug;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            if($request->has('sub_category_id')) {
                $product->sub_category_id = $request->sub_category_id;
            } else {
                $product->sub_category_id = null;
            }
            $product->is_featured = $request->featured;
            $product->save();

            $current_timestamp = Carbon::now()->timestamp . rand(10, 1000);

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $current_timestamp . '.' . $image->extension();
                $this->GenerateProductThumbnailImage($image, $imageName);
                $product->product_meta()->upsert(
                    [
                        ['meta_key' => 'thumbnail', 'meta_value' => $imageName],
                    ],
                    ['product_id', 'meta_key'],
                    ['meta_value']
                );
            }

            // Handle gallery images from Dropzone
            // Images come as comma-separated filenames (already uploaded via AJAX)
            if($request->filled('images')) {
                $gallery_images = $request->images;

                $product->product_meta()->upsert(
                    [
                        ['meta_key' => 'gallery', 'meta_value' => $gallery_images],
                    ],
                    ['product_id', 'meta_key'],
                    ['meta_value']
                );
            }

            $product->product_meta()->upsert(
                [
                    ['meta_key' => 'unit', 'meta_value' => $request->unit],
                ],
                ['product_id', 'meta_key'],
                ['meta_value']
            );

            Product::where('parent_id', $product->id)
                ->whereNotIn('id', $request->variations['id'])
                ->delete();

            $variation_counter = 1;
            foreach($request->variations['unit'] as $index => $variation) {
                if (isset($request->variations['id'][$index])) {
                    $product_variation = Product::find($request->variations['id'][$index]);
                } else {
                    $product_variation = new Product();
                }
                $product_variation->title = $request->name;
                $product_variation->slug = $request->slug . '-' . $request->variations['SKU'][$index];
                $product_variation->category_id = $product->category_id;
                if (isset($request->sub_category_id)) {
                    $product_variation->sub_category_id = $product->sub_category_id;
                } else {
                    $product_variation->sub_category_id = null;
                }
                $product_variation->is_featured = $product->is_featured;
                $product_variation->parent_id = $product->id;
                $product_variation->type = 'variation';
                $product_variation->status = $product->status;
                $product_variation->save();

                if (isset($request->variations['image'][$index])) {
                    $v_image = $request->variations['image'][$index];
                    $v_imageName = $current_timestamp . '-variation-' . $variation_counter . '.' . $v_image->extension();
                    $this->GenerateProductThumbnailImage($v_image, $v_imageName);

                    $product_variation->product_meta()->upsert(
                        [
                            ['meta_key' => 'thumbnail', 'meta_value' => $v_imageName],
                        ],
                        ['product_id', 'meta_key'],
                        ['meta_value']
                    );
                    $variation_counter++;
                }

                $product_variation->product_meta()->upsert(
                    [
                        ['meta_key' => 'unit', 'meta_value' => $request->variations['unit'][$index]],
                        ['meta_key' => 'regular_price', 'meta_value' => $request->variations['regular_price'][$index]],
                        ['meta_key' => 'sale_price', 'meta_value' => $request->variations['sale_price'][$index] ?? ''],
                        ['meta_key' => 'price', 'meta_value' => $request->variations['sale_price'][$index] ?? $request->variations['regular_price'][$index]],
                        ['meta_key' => 'quantity', 'meta_value' => $request->variations['quantity'][$index]],
                        ['meta_key' => 'SKU', 'meta_value' => $request->variations['SKU'][$index]]
                    ],
                    ['product_id', 'meta_key'],
                    ['meta_value']
                );

            }

            return redirect()->back()->with('status', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            if(File::exists(public_path('uploads/products').'/'.$product->product_meta['thumbnail'])) {
                File::delete(public_path('uploads/products').'/'.$product->product_meta['thumbnail']);
            }
            if(File::exists(public_path('uploads/products/thumbnails').'/'.$product->product_meta['thumbnail'])) {
                File::delete(public_path('uploads/products/thumbnails').'/'.$product->product_meta['thumbnail']);
            }
            foreach(explode(',', $product->product_meta['gallery']) as $image) {
                if(File::exists(public_path('uploads/products').'/'.$image)) {
                    File::delete(public_path('uploads/products').'/'.$image);
                }
                if(File::exists(public_path('uploads/products/thumbnails').'/'.$image)) {
                    File::delete(public_path('uploads/products/thumbnails').'/'.$image);
                }
            }

            $product_variations = Product::where('parent_id', $product->id)->get();
            foreach($product_variations as $variation) {
                if(File::exists(public_path('uploads/products').'/'.$variation->product_meta['thumbnail'])) {
                    File::delete(public_path('uploads/products').'/'.$variation->product_meta['thumbnail']);
                }
                if(File::exists(public_path('uploads/products/thumbnails').'/'.$variation->product_meta['thumbnail'])) {
                    File::delete(public_path('uploads/products/thumbnails').'/'.$variation->product_meta['thumbnail']);
                }
                $variation->delete();
            }
            $product->delete();
            return redirect()->back()->with('status', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
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

    public function upload_attachments(Request $request)
    {
        try {
            // Validate the file(s)
            $request->validate([
                'file' => 'required|mimes:png,jpg,jpeg|max:5120', // Single file validation
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();

                // Generate unique filename with timestamp and random number
                $current_timestamp = Carbon::now()->timestamp . rand(10, 1000);
                $filename = $current_timestamp . '.' . $extension;

                // Ensure directories exist
                $destinationPath = public_path('uploads/products');
                $destinationPathThumbnail = public_path('uploads/products/thumbnails');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                if (!File::exists($destinationPathThumbnail)) {
                    File::makeDirectory($destinationPathThumbnail, 0755, true);
                }

                // Use your existing method to generate thumbnails
                $this->GenerateProductThumbnailImage($file, $filename);

                // Return JSON response with multiple path formats
                return response()->json([
                    'success' => true,
                    'filename' => $filename,
                    'path' => 'uploads/products/' . $filename,
                    'url' => url('uploads/products/' . $filename),
                    'thumbnail_url' => url('uploads/products/thumbnails/' . $filename)
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No file uploaded'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function delete_attachment(Request $request)
    {
        try {
            $request->validate([
                'filename' => 'required|string'
            ]);

            $filename = $request->filename;

            // Delete main image
            $imagePath = public_path('uploads/products/' . $filename);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Delete thumbnail
            $thumbnailPath = public_path('uploads/products/thumbnails/' . $filename);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }

            return response()->json([
                'success' => true,
                'message' => 'File deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delete failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
