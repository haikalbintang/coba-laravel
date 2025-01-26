<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input("name");
        $stock = $request->input("stock");
        $gender = $request->input("gender");
        $status = $request->input("status");
        $category = $request->input("category");

        $products = Product::when($name, fn ($query, $name) => $query->name($name));
        $products = match ($stock) {
            'available' => $products->onStock(),
            'sold' => $products->offStock(),
            default => $products,
        };
        $products = match ($gender) {
            'male' => $products->male(),
            'female' => $products->female(),
            'kids' => $products->kids(),
            'unisex' => $products->unisex(),
            default => $products,
        };
        $products = match ($status) {
            'baru' => $products->new(),
            'bekas' => $products->used(),
            default => $products,
        };
        $products = match ($category) {
            'tas' => $products->tas(),
            'baju' => $products->baju(),
            'celana' => $products->celana(),
            'rok' => $products->rok(),
            'sepatu' => $products->sepatu(),
            'topi' => $products->topi(),
            'kacamata' => $products->kacamata(),
            'handphone' => $products->handphone(),
            'televisi' => $products->televisi(),
            'monitor' => $products->monitor(),
            'laptop' => $products->laptop(),
            'keyboard' => $products->keyboard(),
            'mouse' => $products->mouse(),
            'kursi' => $products->kursi(),
            'sofa' => $products->sofa(),
            'kasur' => $products->kasur(),
            'meja' => $products->meja(),
            'lainnya' => $products->lainnya(),
            default => $products,
        };
        $products = $products->withCount("comments")
            ->latest()
            ->paginate(12);
        return view('home', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $product = Product::create($data);
        return redirect(route('products.show', ['product' => $product->id]))->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('comments');
        return view('show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $data = $request->validated();
        $product->update($data);
        return redirect(route('products.show', ['product' => $product->id]))->with('success', 'Barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Barang berhasil dihapus.');
    }

    public function myProducts()
    {
        $products = Product::where('user_id', Auth::id())->withCount("comments")
            ->latest()
            ->paginate(12);
        return view('home', ['products' => $products]);
    }
}
