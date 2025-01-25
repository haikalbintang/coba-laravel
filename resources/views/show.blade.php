@extends('layouts.store')

@section('title', $product->name)

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  <div class="flex justify-between items-center mt-5">
    <x-header>{{ $product->name }}</x-header>
    
    @auth
      @if (auth()->user()->id === $product->user_id)
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
      @endif
    @endauth
  </div>

  <div class="bg-gray-800 p-4 rounded-lg flex mb-4">
    <img class="w-1/2 h-auto" src="https://picsum.photos/180/180/?random={{ $product->id }}" alt="{{ $product->name }}">
    <div class="w-1/2 bg-gray-900 p-4 ml-4 text-lg flex flex-col">
      <p>Deskripsi: {{ $product->description }}</p>
      <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
      <p>Status: {{ $product->is_sold ? 'Sudah Terjual' : 'Belum Terjual' }}</p>
      <div class="mt-auto flex space-x-4">
        <p class="mt-auto text-gray-400 text-sm">Dipost {{ $product->created_at->diffForHumans() }}</p>
        @if ($product->created_at != $product->updated_at)
          <p class="text-gray-400 text-sm">⦁</p>
          <p class="text-gray-400 text-sm">Diedit {{ $product->updated_at->diffForHumans() }}</p>
        @endif
      </div>
    </div>
  </div>

  <div class="grid grid-cols-5 gap-4">
    <div class="col-span-2 mb-8">
      <x-header>Info Penjual</x-header>

      <div class="bg-gray-800 p-4 rounded-lg flex flex-col">
        <div class="flex items-center pb-2">
          <img class="w-[70px] h-[70px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random={{ $product->user_id }}" alt="">
          <div class="ml-4">
            <p class="text-lg font-bold">{{ $product->user->name }}</p>
            <p class="text-sm text-gray-400">Member since {{ $product->user->created_at->diffForHumans() }}</p>
          </div>
        </div>

        <div class="bg-gray-900 p-4">
          <p class="text-lg font-bold">Kontak Penjual</p>
          <p class="text-sm text-gray-400">Email: {{ $product->user->email }}</p>
          <p class="text-sm text-gray-400">No. Telp: +6287877901515</p>
          <p class="text-sm text-gray-400 mt-4">Kontak Admin: +6287877901515</p>
          <p class="text-sm text-gray-400">Alamat kantor: Jl. KH Abdurrahman No. 15, RT 01/01, Pondok Jaya, Cipayung, Depok</p>
        </div>
      </div>
    </div>

    <div class="col-span-3">
      <x-header>Komentar:</x-header>
    
      <div class="bg-gray-800 p-3 space-y-3 mb-8 rounded">
        @forelse ($product->comments as $comment)
          <div class="bg-gray-900 p-4 flex space-x-4">
            <img class="w-[70px] h-[70px] rounded-full p-1 bg-gray-800" src="https://picsum.photos/180/180/?random={{ $comment->user_id }}" alt="">
            <div>
              <p><span class="font-bold">{{ $comment->user->name }}</span></p>
              <p>{{ $comment->text }}</p>
              <div class="flex space-x-2 items-center">
    
                <p class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                @if ($comment->created_at != $comment->updated_at)
                  <p class="text-gray-400 text-sm">[Edited]</p>
                @endif
              </div>
            </div>
          </div>
        @empty
          <p class="text-center text-gray-400 text-sm">Belum ada komentar</p>
        @endforelse
      </div>

      @guest
    <div x-show="flash" class="flex items-center bg-yellow-200 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md mt-4 w-fit mb-8">
      <span class="font-bold mr-1.5">Warning! Log in </span> untuk berkomentar.
      <div class="ml-6 text-yellow-700 cursor-pointer">
        <svg @click="flash = false" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6 6L18 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>              
      </div>
    </div>
  @endguest
      
      @auth
      <div class="bg-gray-800 p-3 pl-5 mb-2 rounded-lg flex items-center space-x-4">
        <img class="w-[70px] h-[70px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random=99" alt="">
        <textarea name="comment" id="" rows="3" class="shadow-sm appearance-none border text-gray-800 leading-tight focus:outline-none focus:shadow-outline w-full bg-gray-200 p-2.5 rounded-lg placeholder-gray-500 placeholder:text-sm placeholder:tracking-wider" placeholder="Silakan bertanya di sini atau berikan komentar..."></textarea>
      </div>
    
      <div class="flex justify-end mb-8">
        <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Add</button>
      </div>
      @endauth
    </div>
  </div>

@endsection