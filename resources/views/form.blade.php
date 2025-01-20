@extends('layouts.store')

@section('title', isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:')

@section('content')
  <x-header>{{ isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:' }}</x-header>

  <div class="p-3 pt-0">
    <form class="text-purple-500 space-y-4" action="{{ isset($product) ? route('products.update', ['product' => $product->id] ) : route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @isset($product)
        @method('PUT')
      @endisset
      <div class="grid grid-cols-2 gap-10">
        <div class="space-y-2">
          <div class="space-y-1">
            <label class="block font-medium" for="name">Nama barang<span class="text-red-500">*</span></label>
            <input class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ $product->name ?? old('name') }}">
            @error('name')
              <p class="text-red-400">{{ $message }}</p>
            @enderror
          </div>
      
          <div class="space-y-1">
            <label class="block font-medium" for="description">Deskripsi<span class="text-red-500">*</span></label>
            <textarea class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10" type="text" name="description" id="description">{{ $product->description ?? old('description') }}</textarea>
            @error('description')
            <p class="text-red-500">{{ $message }}</p>
          @enderror
          </div>
      
          <div class="space-y-1">
            <label class="block font-medium" for="price">Harga<span class="text-red-500">*</span></label>
            <input class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="price" id="price" value="{{ $product->price ?? old('price') }}">
            @error('price')
            <p class="text-red-500">{{ $message }}</p>
          @enderror
          </div>
        </div>
        
        <div>
          <div class="space-y-1">
            <label class="block font-medium" for="image">Gambar<span class="text-red-500">*</span></label>
            <input type="file" name="image" id="image">
            @error('image')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <button class="mt-10 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" type="submit">{{ isset($product) ? 'Edit Spesifikasi Barang' : 'Tambahkan Barang' }}</button>
        </div>
      </div>
  
    </form>
  </div>
@endsection