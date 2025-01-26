@extends('layouts.store')

@section('title', Auth::id() == $user->id ? 'Profil ku' : $user->name)

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  {{-- @guest
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
  @endguest --}}
  <x-header>{{ Auth::id() == $user->id ? 'Profil ku' : 'Profil User' }}</x-header>
  <div class="flex flex-col items-center justify-center space-y-5 bg-gray-800 rounded-lg mx-2 p-4 mb-2">
    <div class="flex flex-col items-center justify-center space-y-2">
      <h1 class="text-3xl text-white font-bold">{{ $user->name }}</h1>
      <p class="text-sm text-gray-400">Member since {{ $user->created_at->diffForHumans() }}</p>
    </div>
    <img class="w-44 h-44 rounded-full p-2 bg-white" src="https://picsum.photos/180/180/?random={{ $user->id }}" alt="{{ $user->name }}">
    <div class="p-4 bg-gray-900 rounded-lg text-lg space-y-2 flex flex-col items-center justify-center">
      <p>Email: {{ $user->email }}</p>
      <p>WA: 087877901515</p>
    </div>
  </div>

  <x-header>{{ Auth::id() == $user->id ? 'Barang-barang ku' : 'Barang '. $user->name }}</x-header>
  <div class="grid grid-cols-3 gap-3">

    @forelse ( $products as $product )
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
    @empty
    <div class="m-2 p-4 text-center bg-gray-800 rounded-lg col-span-3 text-gray-300">
      <p>Belum ada barang.</p>
    </div>
    @endforelse
  </div>

  
@endsection