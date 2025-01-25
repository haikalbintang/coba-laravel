@extends('layouts.store')

@section('title', isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:')

@section('content')
  @guest
    @if ( !isset($product) )
    <div x-show="flash" class="flex items-center bg-yellow-200 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md mt-4 w-fit">
      <span class="font-bold mr-1.5">Warning! Log in </span> untuk menjual barang.
      <div class="ml-6 text-yellow-700 cursor-pointer">
        <svg @click="flash = false" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6 6L18 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>              
      </div>
    </div>
    @endif
  @endguest
  <x-header>{{ isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:' }}</x-header>

  <div class="p-3 pt-0">
    <div class="bg-gray-800 p-5 pt-1 rounded-lg">
      <form class="text-purple-500 space-y-4" action="{{ isset($product) ? route('products.update', ['product' => $product->id] ) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($product)
          @method('PUT')
        @endisset
        <div class="grid grid-cols-2 gap-10">
          <div class="space-y-2">
            <div class="space-y-1">
              <label class="block font-medium" for="name">Nama barang<span class="text-red-500">*</span></label>
              <input class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ $product->name ?? old('name') }}" placeholder="nama barang...">
              @error('name')
                <p class="text-red-400">{{ $message }}</p>
              @enderror
            </div>
        
            <div class="space-y-1">
              <label class="block font-medium" for="description">Deskripsi<span class="text-red-500">*</span></label>
              <textarea class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="12" type="text" name="description" id="description" placeholder="spesifikasi, tahun produksi, dan status barang yang harus diketahui pembeli...">{{ $product->description ?? old('description') }}</textarea>
              @error('description')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>
        
            <div class="space-y-1">
              <label class="block font-medium" for="price">Harga<span class="text-red-500">*</span></label>
              <input class="w-full shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="price" id="price" value="{{ $product->price ?? old('price') }}" placeholder="harga jual barang...">
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
  
            @guest
                <button class="mt-10 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed" type="submit" disabled>
                    {{ isset($product) ? 'Edit Spesifikasi Barang' : 'Tambahkan Barang' }}
                </button>
            @else
                <button class="mt-10 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ isset($product) ? 'Edit Spesifikasi Barang' : 'Tambahkan Barang' }}
                </button>
            @endguest

          </div>
        </div>
    
      </form>
    </div>
  </div>
@endsection