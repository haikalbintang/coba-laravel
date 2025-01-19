@extends('layouts.store')

@section('title', 'Toko Laravel')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  <x-greet></x-greet>
  <x-header><span class="text-3xl text-gray-100">Welcome to</span> <span class="font-bold">Toko Laravel</span>! <span class="text-2xl text-gray-100">Tempat jual beli barang bekas.</span></x-header>

  <div class="flex justify-between mx-4 mb-6 mt-3">
    <a href="/products/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 rounded text-lg">+ Jual Barang</a>
    <input class="rounded" type="text" placeholder="Cari Barang...">
  </div>

  <div class="grid grid-cols-3 gap-3">

    @forelse ( $products as $product )
      <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
        <img class="object-cover" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
        <h2 class="text-xl font-bold p-2 text-white">{{ $product->name }}</h2>
        <p class="text-base p-2 text-gray-200">{{ Str::limit($product->description, 55) }} <span class="text-purple-500 hover:underline"><a href={{ route('products.show', ['product' => $product->id]) }}>lihat detail &raquo;</a></span></p>
        <h3 class="mt-auto text-2xl font-bold p-2 text-white text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
        <p @class(['text-green-600' => !$product->is_sold, 'text-gray-400' => $product->is_sold])>{{ $product->is_sold ? 'Sudah Terjual' : 'Stok Tersedia' }}</p>
      </div>
    @empty
      <p>Tidak ada barang.</p>
    @endforelse
  </div>

  @if ($products->count() > 0)
    {{ $products->links() }}
  @endif
@endsection
