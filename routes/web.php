<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\CommentController;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Koneksi database berhasil!';
    } catch (\Exception $e) {
        return 'Koneksi database gagal: ' . $e->getMessage();
    }
});


Route::get('/nginx-log', function () {
    $logPath = storage_path('logs/nginx_error.log');
    if (file_exists($logPath)) {
        return response()->file($logPath);
    } else {
        return 'Log Nginx tidak ditemukan.';
    }
});

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::view('/products/create', 'products.create')->name('products.create');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');


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
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/profiles', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

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
    return 'Ups, sorry wrong URLs.'; 
});


require __DIR__.'/auth.php';
