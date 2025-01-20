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
        <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('products.edit', ['product' => $product]) }}">Edit</a>
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

  <div class="bg-gray-800 p-4 rounded-lg flex mb-4">
    <img class="w-[430px] h-[430px]" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
    <div class="bg-gray-900 p-4 ml-4 text-lg w-full flex flex-col">
      <p>Deskripsi: {{ $product->description }}</p>
      <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
      <p>Status: {{ $product->is_sold ? 'Sudah Terjual' : 'Belum Terjual' }}</p>
      <p class="mt-auto text-gray-400 text-sm">Dipost {{ $product->created_at->diffForHumans() }}</p>
      @if ($product->created_at != $product->updated_at)
        <p class="text-gray-400 text-sm">Diedit {{ $product->updated_at->diffForHumans() }}</p>
      @endif
    </div>
  </div>

  <x-header>Komentar:</x-header>

  <div class="bg-gray-800 p-1 space-y-1 mb-8 rounded">
    @foreach ($product->comments as $comment)
      <div class="bg-gray-900 p-4 flex space-x-4">
        <img class="w-[70px] h-[70px] rounded-full p-1 bg-gray-800" src="https://picsum.photos/180/180/?random={{ $comment->user_id }}" alt="">
        <div>
          <p>{{ $comment->text }}</p>
          <div class="flex space-x-2 items-center">

            <p class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
            @if ($comment->created_at != $comment->updated_at)
              <p class="text-gray-400 text-sm">[Edited]</p>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  <div class="bg-gray-800 p-2 pl-5 mb-2 rounded-lg flex items-center space-x-4">
    <img class="w-[70px] h-[70px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random={{ $comment->user_id }}" alt="">
    <textarea name="comment" id="" rows="3" class="shadow-sm appearance-none border text-gray-800 leading-tight focus:outline-none focus:shadow-outline w-full bg-gray-200 p-2.5 rounded-lg placeholder-gray-500 placeholder:text-sm placeholder:tracking-wider" placeholder="Silakan bertanya di sini atau berikan komentar..."></textarea>
  </div>

  <div class="flex justify-end mb-8">
    <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add</button>
  </div>

@endsection