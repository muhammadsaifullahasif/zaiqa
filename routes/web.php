<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutSettingController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/', function() {
//     return view('auth.login');
// })->name('home.index');
// Route::get('/', function() {
//     return view('index');
// });
Route::get('/about', function() {
    return view('about');
});
Route::get('/contact', function() {
    return view('contact');
})->name('contact.index');
Route::get('/catalog', function(){
    return view('catalog');
});
Route::get('/single-product', function(){
    return view('single-product');
});
Route::get('/cart', function(){
    return view('cart');
})->name('cart.index');
Route::get('/checkout', function(){
    return view('checkout');
});
Route::get('/orders', function(){
    return view('user.orders');
});
Route::get('/orders/12345', function(){
    return view('user.order-detail');
});
Route::get('/account-dashboard', function(){
    return view('user.index');
});
Route::get('/account-details-edit', function(){
    return view('user.account-detail-edit');
});
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
// Route::get('/contact', [HomeController::class, 'contact_index'])->name('contact.index');
Route::post('/contact/store', [HomeController::class, 'contact_store'])->name('contact.store');
Route::get('/shop/{product_slug}', [ShopController::class, 'product_detail'])->name('shop.product.detail');

// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/update-qty', [CartController::class, 'update_cart_qty'])->name('cart.update.qty');
Route::delete('/cart/remove-item/{id}', [CartController::class, 'remove_cart_item'])->name('cart.remove.item');
Route::delete('/cart/clear', [CartController::class, 'empty_cart'])->name('cart.clear');
Route::post('/cart/coupon_code', [CartController::class, 'apply_coupon_code'])->name('cart.coupon.code');
Route::delete('/cart/remove_coupon_code', [CartController::class, 'remove_coupon_code'])->name('cart.remove.coupon.code');
// Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
Route::post('/place-order', [CartController::class, 'place_order'])->name('checkout.place.order');
Route::get('/order-confirmation', [CartController::class, 'order_confirmation'])->name('order.confirmation');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add_to_wishlist'])->name('wishlist.add');
Route::put('/wishlist/update-qty', [WishlistController::class, 'update_wishlist_qty'])->name('wishlist.update.qty');
Route::delete('/wishlist/remove-item/{id}', [WishlistController::class, 'remove_wishlist_item'])->name('wishlist.remove.item');
Route::delete('/wishlist/clear', [WishlistController::class, 'empty_wishlist'])->name('wishlist.clear');
Route::post('/wishlist/move-to-cart/{id}', [WishlistController::class, 'move_to_cart'])->name('wishlist.move.to.cart');

Route::middleware(['auth'])->group(function(){
    // Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');

    Route::get('/account-dashboard/orders', [UserController::class, 'orders'])->name('user.orders');
    Route::get('/account-dashboard/orders/detail/{id}', [UserController::class, 'order_detail'])->name('user.order.detail');
    Route::put('/account-dashboard/orders/detail/cancel/{id}', [UserController::class, 'order_cancel'])->name('user.order.cancel');
    Route::get('/account-dashboard/address', [UserController::class, 'address'])->name('user.address');
    Route::get('/account-dashboard/address/add', [UserController::class, 'address_add'])->name('user.address.add');
    Route::post('/account-dashboard/address/store', [UserController::class, 'address_store'])->name('user.address.store');
    Route::get('/account-dashboard/address/edit/{id}', [UserController::class, 'address_edit'])->name('user.address.edit');
    Route::put('/account-dashboard/address/update/{id}', [UserController::class, 'address_update'])->name('user.address.update');
    Route::get('/account-dashboard/detail', [UserController::class, 'account_detail'])->name('user.account.detail');
    Route::put('/account-dashboard/detail/update', [UserController::class, 'account_detail_update'])->name('user.account.detail.update');
    Route::get('/account-dashboard/wishlist', [UserController::class, 'account_wishlist'])->name('user.account.wishlist');
});

Route::middleware(['auth'], AuthAdmin::class)->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');

    Route::get('/admin/categories/add', [AdminController::class, 'category_add'])->name('admin.category.add');
    Route::post('/admin/categories/store', [AdminController::class, 'category_store'])->name('admin.category.store');
    Route::get('/admin/categories/edit/{id}', [AdminController::class, 'category_edit'])->name('admin.category.edit');
    Route::put('/admin/categories/update/{id}', [AdminController::class, 'category_update'])->name('admin.category.update');
    Route::delete('/admin/categories/delete/{id}', [AdminController::class, 'category_delete'])->name('admin.category.delete');
    Route::post('/admin/categories/get-sub-category', [AdminController::class, 'sub_category_get'])->name('admin.category.get-sub-category');
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');

    Route::get('/admin/units', [AdminController::class, 'units'])->name('admin.units');
    Route::get('/admin/units/add', [AdminController::class, 'unit_create'])->name('admin.units.create');
    Route::post('/admin/units/store', [AdminController::class, 'unit_store'])->name('admin.units.store');
    Route::get('/admin/units/{id}/edit', [AdminController::class, 'unit_edit'])->name('admin.units.edit');
    Route::put('/admin/units/{id}/update', [AdminController::class, 'unit_update'])->name('admin.units.update');
    Route::delete('/admin/units/{id}/delete', [AdminController::class, 'unit_delete'])->name('admin.units.delete');

    // Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    // Route::get('/admin/products/add', [AdminController::class, 'product_add'])->name('admin.product.add');
    // Route::post('/admin/products/store', [AdminController::class, 'product_store'])->name('admin.product.store');
    // Route::get('/admin/products/edit/{id}', [AdminController::class, 'product_edit'])->name('admin.product.edit');
    // Route::put('/admin/products/update/{id}', [AdminController::class, 'product_update'])->name('admin.product.update');
    // Route::delete('/admin/products/delete/{id}', [AdminController::class, 'product_delete'])->name('admin.product.delete');
    // Route::post('/admin/products/{id}/add-variation', [AdminController::class, 'add_variation'])->name('admin.product.add-variation');
    // Route::delete('/admin/products/{id}/remove-variation/', [AdminController::class, 'remove_variation'])->name('admin.product.remove-variation');
    // Route::post('/admin/products/{id}/add-all-variations', [AdminController::class, 'add_all_variations'])->name('admin.product.add-all-variations');

    Route::resource('/admin/products', ProductController::class);
    Route::post('/products/upload-attachments', [ProductController::class, 'upload_attachments'])->name('products.upload-attachments');
    Route::delete('/products/delete-attachment', [ProductController::class, 'delete_attachment'])->name('products.delete-attachment');

    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/orders/detail/{id}', [AdminController::class, 'order_detail'])->name('admin.order.detail');
    Route::put('/admin/orders/detail/status/update/{id}', [AdminController::class, 'order_status_update'])->name('admin.order.status.update');
    Route::get('/admin/orders/tracking', [AdminController::class, 'order_tracking'])->name('admin.order.tracking');
    Route::get('/admin/orders/reports', [AdminController::class, 'order_reports'])->name('admin.order.reports');
    Route::get('/admin/orders/reports/generate', [AdminController::class, 'generate_order_reports'])->name('admin.order.reports.generate');
    Route::get('/admin/orders/reports/export', [AdminController::class, 'export_order_reports'])->name('admin.order.reports.export');

    Route::get('/admin/slides', [AdminController::class, 'slides'])->name('admin.slides');
    Route::get('/admin/slides/add', [AdminController::class, 'slides_add'])->name('admin.slides.add');
    Route::post('/admin/slides/store', [AdminController::class, 'slides_store'])->name('admin.slides.store');
    Route::get('/admin/slides/edit/{id}', [AdminController::class, 'slides_edit'])->name('admin.slides.edit');
    Route::put('/admin/slides/update/{id}', [AdminController::class, 'slides_update'])->name('admin.slides.update');
    Route::delete('/admin/slides/delete/{id}', [AdminController::class, 'slide_delete'])->name('admin.slide.delete');

    Route::get('/admin/coupons', [AdminController::class, 'coupons'])->name('admin.coupons');
    Route::get('/admin/coupons/add', [AdminController::class, 'coupon_add'])->name('admin.coupon.add');
    Route::post('/admin/coupons/store', [AdminController::class, 'coupon_store'])->name('admin.coupon.store');
    Route::get('/admin/coupons/edit/{id}', [AdminController::class, 'coupon_edit'])->name('admin.coupon.edit');
    Route::put('/admin/coupons/update/{id}', [AdminController::class, 'coupon_update'])->name('admin.coupon.update');
    Route::delete('/admin/coupons/delete/{id}', [AdminController::class, 'coupon_delete'])->name('admin.coupon.delete');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/add', [AdminController::class, 'user_add'])->name('admin.user.add');
    Route::post('/admin/users/store', [AdminController::class, 'user_store'])->name('admin.user.store');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');

    Route::get('/admin/shipping-policy', [ShippingController::class, 'index'])->name('admin.shipping-policy');
    Route::post('/admin/shipping-policy/store', [ShippingController::class, 'store'])->name('admin.shipping-policy.store');
    Route::post('/admin/shipping-policy/vat_store', [ShippingController::class, 'vat_store'])->name('admin.shipping-policy.vat_store');
    
    Route::get('/admin/checkout-setting', [CheckoutSettingController::class, 'index'])->name('admin.checkout-setting');
    Route::post('/admin/checkout-setting/store', [CheckoutSettingController::class, 'store'])->name('admin.checkout-setting.store');
    Route::post('/admin/checkout-setting/setting_store', [CheckoutSettingController::class, 'setting_store'])->name('admin.checkout-setting.setting_store');

    Route::get('/admin/setting', [AdminController::class, 'setting'])->name('admin.setting');
});
