@extends('layouts.store')

@section('title', 'Toko Laravel')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  @auth
    <x-header>Halo, {{ auth()->user()->name }}!</x-header>
  @endauth
  <x-header><span class="text-2xl text-gray-100">Welcome to</span> <span class="font-bold text-3xl">Toko Laravel</span>! <span class="text-2xl text-gray-100">Tempat jual beli barang bekas.</span></x-header>

  <div class="flex justify-between mx-2.5 mb-6 mt-3">
    <a href="/products/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 rounded text-base">+ Jual Barang</a>
    <form action="{{ route('products.index') }}" method="GET">
      {{-- @csrf --}}
      @if (request('name'))
      <a class=" bg-transparent text-white font-bold py-2 px-3 rounded" href="{{ route('products.index') }}">Reset</a>
      @endif
      <input type="hidden" name="stock" value="{{ request('stock') }}">
      <input class="rounded bg-gray-300 focus:bg-gray-50 text-gray-900" type="text" name="name" placeholder="Cari Barang..." value="{{ request('name') }}">
      <button class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-3 rounded" type="submit">Cari</button>
    </form>
  </div>

  <div class="grid grid-cols-3 gap-3">

    @forelse ( $products as $product )
      <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
        <img class="object-cover" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
        <h2 class="text-xl font-bold p-2 text-white">{{ $product->name }}</h2>
        <p class="text-base p-2 text-gray-200">{{ Str::limit($product->description, 55) }} <span class="text-purple-500 hover:underline"><a href={{ route('products.show', ['product' => $product->id]) }}>lihat detail &raquo;</a></span></p>
        <h3 class="mt-auto text-2xl font-bold p-2 text-white text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
        <div class="flex justify-between items-center px-2">
          <p @class(['text-green-600' => !$product->is_sold, 'text-gray-400' => $product->is_sold])>{{ $product->is_sold ? 'Sudah Terjual' : 'Stok Tersedia' }}</p>
          <div class="flex items-center space-x-1.5">
            <x-comment-icon></x-comment-icon>
            <p>{{ $product->comments_count }}</p>
          </div>
        </div>
      </div>
    @empty
    <div class="m-2 p-4 text-center bg-gray-800 rounded-lg col-span-3 text-gray-300">
      <p>Tidak ada barang.</p>
    </div>
    @endforelse
  </div>

  @if ($products->count() > 0)
    <div class="p-2 mb-4">
      {{ $products->links() }}
    </div>
  @endif
@endsection
