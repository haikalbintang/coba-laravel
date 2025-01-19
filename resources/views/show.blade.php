@extends('layouts.store')

@section('title', $product->name)

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  <x-greet></x-greet>
  
  <div class="flex justify-between items-center">
    <x-header>{{ $product->name }}</x-header>
    
    <div class="flex items-center space-x-4">
      <div>
        <a class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('products.edit', ['product' => $product]) }}">Edit</a>
      </div>

      <div>
        <form action="{{ route('products.toggle-sold', ['product' => $product]) }}" method="post">
          @csrf
          @method('put')
          <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">{{ $product->is_sold ? 'Stok Ulang' : 'Sudah Terjual' }}</button>
        </form>
      </div>
  
      <div class="pr-4">
        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
          @csrf
          @method('delete')
          <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete Barang</button>
        </form>
      </div>
    </div>
  </div>

  <div class="bg-gray-800 p-4 rounded-lg flex">
    <img class="w-[430px] h-[430px]" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
    <div class="bg-gray-900 p-4 ml-4 text-lg w-full">
      <p>Deskripsi: {{ $product->description }}</p>
      <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
      <p>Status: {{ $product->is_sold ? 'Sudah Terjual' : 'Belum Terjual' }}</p>
    </div>
  </div>


@endsection