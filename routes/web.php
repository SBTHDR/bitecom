<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

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
})->name('dashboard');

// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Admin Routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::middleware(['auth:sanctum,admin', 'verified'])->post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');

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

// User Dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// User Routes
 Route::get('/', [HomeController::class, 'index']);