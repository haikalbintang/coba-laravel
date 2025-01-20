<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased mx-auto bg-[#111827] text-white">
  <div class="flex h-screen">

    <aside class="w-1/4 h-screen relative overflow-y-auto pl-28 text-white bg-[#111523]">
      @yield('sidebar')
    </aside>
  
    <main x-data="{ flash: true }" class="w-3/4 h-full overflow-y-auto pl-12 pr-48">
      <x-navbar></x-navbar>
      @if (session()->has('success'))
        <div x-show="flash" class="flex items-center bg-green-200 border border-green-400 text-green-700 px-4 py-2 rounded-md mt-4 w-fit">
          <span class="font-bold mr-1.5">Sukses!</span>{{ session('success') }}
          <div class="ml-6 text-green-700 cursor-pointer">
            <svg @click="flash = false" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 6L6 18" stroke="#15803d" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6 6L18 18" stroke="#15803d" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </div>
        </div>
      @endif
      @yield('content')
    </main>
  </div>
</body>
</html>