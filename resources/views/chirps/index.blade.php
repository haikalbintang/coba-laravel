@extends('layouts.store')

@section('title', 'Chirps')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')

  @guest
  <div x-show="flash" class="flex items-center bg-yellow-200 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md mt-4 w-fit">
    <span class="font-bold mr-1.5">Warning! Log in</span> untuk berbagi kebutuhan atau komentar.
    <div class="ml-6 text-yellow-700 cursor-pointer">
      <svg @click="flash = false" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 6L6 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M6 6L18 18" stroke="#a16207" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>              
    </div>
  </div>
  @endguest

  
  
  <main class="mx-2 mt-3">
    @auth
    <x-header>Berbagi Kebutuhanmu</x-header>
    <div class="border border-gray-700 p-4 rounded-lg mb-4">
      <form action="{{ route('chirps.store') }}" method="POST">
        @csrf
        <textarea class="w-full p-2.5 rounded-lg bg-gray-800 text-white" name="text" placeholder="Ada yang jual laptop bekas? Dicari laptop dengan harga di bawah 2 juta." rows="3"></textarea>
        <button class="mt-2 w-full p-2.5 rounded-lg bg-purple-500 hover:bg-purple-600 text-white" type="submit">Kirim</button>
      </form>
    </div>
    @endauth

    <x-header>Bantu Penuhi Kebutuhan Orang Lain</x-header>

    @forelse ( $chirps as $chirp )
      <div class="mb-6">
      @if (!$chirp->parent_id)
        <x-chirps.item :chirp="$chirp" />

        @foreach ($chirp->replies as $reply)
          <x-chirps.reply :reply="$reply"></x-chirps.reply>
        @endforeach

        @auth
        <form class="-ml-2 flex w-full space-x-3" action="{{ route('chirps.store') }}" method="POST">
          @csrf
          <div class="w-full">
            <input type="hidden" name="parent_id" value="{{ $chirp->id }}">
            <textarea class="w-full p-2.5 rounded-lg bg-gray-900 text-white" name="text" placeholder="Tawarkan solusi..." rows="2"></textarea>
            <button class="mt-2 mb-4 w-full p-2.5 rounded-lg bg-purple-500 hover:bg-purple-600 text-white" type="submit">Kirim</button>
          </div>
          <img class="w-[80px] h-[80px] mt-2.5 rounded-full p-1 bg-gray-600" src="https://picsum.photos/180/180/?random={{ Auth::id() }}" alt="">
        </form>
        @else
        <div class="ml-[108px] mb-2 py-1 text-center rounded-lg bg-gray-800">
          <p class="text-gray-400 text-sm">Login untuk berbagi kebutuhan atau komentar.</p>
        </div>
        @endauth
      </div>
    @endif

    @empty
      <p>Belum ada chirps.</p>
    @endforelse

    @if ($chirps->count() > 0)
    <div class="p-2 mb-4">
      {{ $chirps->links() }}
    </div>
    @endif

  </main>

@endsection