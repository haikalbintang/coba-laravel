<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);

Route::get('/', function () {

    $products = Product::all();

    // $name = 'Haikal Bintang';

    return view('home', ["products" => $products]);
})->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return 'Sorry, wrong URLs.'; 
});

require __DIR__.'/auth.php';
