@extends('layouts.store')

@section('title', isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:')

@section('content')
  <x-header>{{ isset($product) ? 'Edit barang bekasmu:' : 'Jual barang bekasmu:' }}</x-header>

  <form class="text-purple-500" action="{{ isset($product) ? route('products.update', ['product' => $product->id] ) : route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @isset($product)
      @method('PUT')
    @endisset
    <div>
      <label for="name">Nama barang</label>
      <input type="text" name="name" id="name" value="{{ $product->name ?? old('name') }}">
      @error('name')
        <p class="text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="description">Deskripsi</label>
      <textarea rows="10" type="text" name="description" id="description">{{ $product->description ?? old('description') }}</textarea>
      @error('description')
      <p class="text-red-500">{{ $message }}</p>
    @enderror
    </div>

    <div>
      <label for="price">Harga</label>
      <input type="number" name="price" id="price" value="{{ $product->price ?? old('price') }}">
      @error('price')
      <p class="text-red-500">{{ $message }}</p>
    @enderror
    </div>

    <div>
      <label for="image">Gambar</label>
      <input type="file" name="image" id="image">
      @error('image')
      <p class="text-red-500">{{ $message }}</p>
    @enderror
    </div>

    <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" type="submit">{{ isset($product) ? 'Edit Spesifikasi Barang' : 'Tambahkan Barang' }}</button>
  </form>
@endsection