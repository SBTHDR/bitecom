<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AdminProfileController;

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

// User Dashboard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// User Routes
 Route::get('/', [HomeController::class, 'index']);