@extends('layouts.store')

@section('title', 'Chirps')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  <x-greet></x-greet>

  <x-header>Berbagi Kebutuhanmu</x-header>
  
  <main class="mx-2 mt-3">
    @forelse ( $chirps as $chirp )
      <div class="bg-gray-800 p-2.5 rounded-lg flex justify-between mb-6">
        <div class="w-[100px] flex p-1">
          <img class="w-[80px] h-[80px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random={{ $chirp->user_id }}" alt="">
        </div>
        <div class="w-full ml-2">
          <div class="flex items-center justify-between px-1">
            <div class="flex items-center space-x-3">
              <p class="text-lg font-bold">{{ $chirp->user->name }}</p>
              <p class="text-sm text-gray-400">joined since {{ $chirp->user->created_at->diffForHumans() }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-400">posted {{ $chirp->created_at->diffForHumans() }}</p>
            </div>
          </div>
          <p class="pt-2 p-2.5 mt-2 text-white bg-gray-900 rounded-lg">{{ $chirp->text }}</p>
        </div>
      </div>
      @empty
        <p>Belum ada chirps.</p>
      @endforelse
  </main>

@endsection