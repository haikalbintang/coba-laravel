@extends('layouts.store')

@section('title', 'Explore Users')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  <x-header>Explore Users</x-header>
  <div class="flex justify-between mx-2.5 mb-6 mt-3">
    <form action="{{ route('profile.index') }}" method="GET">
      @csrf
      @if (request('name'))
      <a class=" bg-transparent text-white font-bold py-2 px-3 rounded" href="{{ route('profile.index') }}">Reset</a>
      @endif
      <input class="rounded bg-gray-300 focus:bg-gray-50 text-gray-900" type="text" name="name" placeholder="Cari Orang ..." value="{{ request('name') }}">
      <button class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-3 rounded" type="submit">Cari</button>
    </form>
  </div>
  <div class="grid grid-cols-5 gap-1 mb-4">
    @forelse ( $users as $user )
      <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg space-y-2">
        <img class="rounded-full p-1.5 bg-white" src="https://picsum.photos/180/180/?random={{ $user->id }}" alt="{{ $user->name }}">
        <div class="flex items-center">
          <h1 class="text-lg text-white text-center font-bold">{{ $user->name }}</h1>
        </div>
        <div class="flex items-center justify-center">
          <a href="{{ route('profile.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">View Profile</a>
        </div>
      </div>
    @empty
      <p>No users found.</p>
    @endforelse
  </div>
  @if ($users->count() > 0)
    <div class="p-2 mb-4">
      {{ $users->links() }}
    </div>
  @endif
@endsection