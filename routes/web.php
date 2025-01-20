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

// STORE /products
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// SHOW /product/{product}
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');

// EDIT /product/{product}/edit
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// UPDATE /product/{product}
Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');

// DESTROY /product/{product}
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::put('/product/{product}/toggle-sold', function (Product $product) {
    $product->toggleSold();
    return redirect()->back()->with('success','Status barang berhasil diubah.');
})->name('products.toggle-sold');


// INDEX /chirps
Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');







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
