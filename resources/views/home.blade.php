@extends('layouts.store')

@section('title', 'Toko Laravel')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  @auth
    <x-header>Halo, {{ auth()->user()->name }}! Welcome Back! Temukan kebutuhanmu disini!</x-header>
  @else
    <x-header>Welcome to <span class="text-3xl font-bold">Toko Laravel!</span> Platform jual beli barang bekas.</x-header>
  @endauth
  <div class="flex items-center justify-between pr-2">
    <x-header>Kebutuhan terbaru!</x-header>
    <p><a class="text-purple-500 hover:underline"href="/chirps">Lihat semua kebutuhan &raquo;</a></p>
  </div>
  <div class="mx-2">
    @foreach ($latestChirps as $chirp)
      <x-chirps.item :chirp="$chirp" />
    @endforeach
  </div>

  <div class="flex items-center justify-between pr-2">
    <x-header>Barang terbaru!</x-header>
    <p><a class="text-purple-500 hover:underline" href="/products">Lihat semua barang &raquo;</a></p>
  </div>
  <div class="grid grid-cols-3 gap-3 mb-8">
    @foreach ($latestProducts as $product)
    <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
      <img class="object-cover" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
      <h2 class="text-xl font-bold p-2 text-white">{{ $product->name }}</h2>
      <p class="text-base p-2 text-gray-200">{{ Str::limit($product->description, 55) }} <span class="text-purple-500 hover:underline"><a href={{ route('products.show', ['product' => $product->id]) }}>lihat detail &raquo;</a></span></p>
      <h3 class="mt-auto text-2xl font-bold p-2 text-white text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
      <div class="flex justify-between items-center px-2">
        <p @class(['text-gray-300' => !$product->is_sold, 'text-gray-400' => $product->is_sold])>{{ $product->is_sold ? 'Sudah Terjual' : 'Tersedia' }}</p>
        <div class="flex items-center space-x-1.5">
          <x-comment-icon></x-comment-icon>
          <p>{{ $product->comments_count }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
