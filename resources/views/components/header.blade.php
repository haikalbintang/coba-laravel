<header class="">
  @empty($name)
    <p class="font-medium px-3 pt-4 text-gray-200 text-right">Anda belum <span class="text-purple-500 hover:underline"><a href="{{ route('login') }}"> Log in.</a></span></p>
  @endempty
  <h1 class="text-4xl font-semibold px-3 pb-5 text-white">{{ $slot }}</h1>
</header>