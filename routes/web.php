<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'totalProducts' => Product::count(),
        'totalCategories' => Category::count(),
        'latestProducts' => Product::with('category')->latest()->take(5)->get(),
        'latestCategories' => Category::latest()->take(5)->get(),
    ]);
})->name('dashboard');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
