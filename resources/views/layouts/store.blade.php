<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>
<body class="antialiased mx-auto bg-[#111827] text-white">
  <div class="flex h-screen">

    <aside class="w-1/4 h-screen relative overflow-y-auto pl-28 text-white bg-[#111523]">
      @yield('sidebar')
    </aside>
  
    <main class="w-3/4 h-full overflow-y-auto pl-12 pr-48">
      <x-navbar></x-navbar>
      @if (session()->has('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded-md mt-4 w-fit">
          {{ session('success') }}
        </div>
      @endif
      @yield('content')
    </main>
  </div>
</body>
</html>