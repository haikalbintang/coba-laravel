<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// INDEX /products
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', function () {
    return redirect(route('products.index'));
});

// CREATE /product
Route::view('/products/create', 'create')->name('products.create');

// SHOW /product/{product}
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');

// INDEX /chirps
Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');


Route::middleware(['auth'])->group(function () { 
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::put('/products/{product}/toggle-sold', function (Product $product) {
        $product->toggleSold();
        return redirect()->back()->with('success','Status barang berhasil diubah.');
    })->name('products.toggle-sold');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
});


Route::get('/my-products', [ProductController::class, 'myProducts'])->middleware('auth')->name('my-products');


// GET /about
Route::get('/about', function () {
    return view('about');
})->name('about');

// GET /contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


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
