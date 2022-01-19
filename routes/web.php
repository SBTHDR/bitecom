<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\MycartController;
use App\Http\Controllers\User\MyCartController as UserMyCartController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\UserCashController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Admin Login
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// Admin Dashboard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Admin Routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::middleware(['auth:sanctum,admin', 'verified'])->post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');

// Admin Order Routes
Route::group(['prefix' => 'orders', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

    // Order Processing Routes
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    // Order Processing
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    // Admin Order Invoice
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
});

// Brand routes
Route::group(['prefix' => 'brand', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/edit/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
});

// Category routes
Route::group(['prefix' => 'category', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
});

// Sub Category routes
Route::group(['prefix' => 'sub/category', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/', [SubCategoryController::class, 'index'])->name('sub.category.index');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('sub.category.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub.category.edit');
    Route::post('/edit/{id}', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub.category.delete');
});

// Product routes
Route::group(['prefix' => 'products', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
});

// Slider routes
Route::group(['prefix' => 'sliders', 'middleware' => ['auth:sanctum,admin', 'verified']], function () {
    Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::post('/edit/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('sliders.delete');
});

// User Dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// User MyCart
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum,web', 'verified']], function () {
    Route::get('/my-cart', [UserMyCartController::class, 'index'])->name('mycart');
    Route::get('/get-cart-product', [UserMyCartController::class, 'getMyCart']);
    Route::get('/cart-remove/{rowId}', [UserMyCartController::class, 'RemoveCartProduct']);
    
    Route::get('/cart-increment/{rowId}', [UserMyCartController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [UserMyCartController::class, 'CartDecrement']);

    Route::get('/coupon-calculation', [UserMyCartController::class, 'CouponCalculation']);
    Route::get('/checkout', [UserMyCartController::class, 'CheckoutCreate'])->name('checkout');

    // Checkout Routes
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    //  My Order Routes
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    // Invoice
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    // Cash on Delivery
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
});

// User Routes
 Route::get('/', [HomeController::class, 'index']);
 Route::get('/product/details/{id}', [HomeController::class, 'show'])->name('product.details');

//  Add To Cart Route
 Route::get('/product/cart/{id}', [HomeController::class, 'addToCart']);

 //  Cart Route
 Route::post('/product/cart/store/{id}', [CartController::class, 'addToCartMenu']);
 Route::get('/product/mini/cart/', [CartController::class, 'addToMiniCart']);
 Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);



