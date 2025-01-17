<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toko Laravel</title>
  @vite('resources/css/app.css')
</head>
<body class="antialiased mx-auto bg-[#111827]">
  <div class="flex h-screen">

    <aside class="w-1/4 h-screen relative overflow-y-auto pl-32 text-white bg-[#111523]">
      <x-logo></x-logo>
      <div class="pt-32 min-w-36">
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
        <p>Lorem, ipsum.</p>
      </div>
    </aside>
  
    <main class="w-3/4 h-full overflow-y-auto pl-8 pr-40">
      <x-navbar></x-navbar>
      <x-header><span class="text-3xl text-gray-100">Welcome to</span> <span class="font-bold">Toko Laravel</span>! <span class="text-2xl text-gray-100">Tempat jual beli barang bekas.</span></x-header>


      <div class="grid grid-cols-3 gap-3">
        <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
          <img src="https://picsum.photos/180" alt="product image">
          <h2 class="text-xl font-bold p-2 text-white">{{ $products[0]['name'] }}</h2>
          <p class="text-base p-2 text-gray-200">{{ Str::limit($products[0]['description'], 55) }} <span class="text-purple-500 hover:underline"><a href="/product-detail/{{ $products[0]['id'] }}">lihat detail &raquo;</a></span></p>
          <h3 class="text-2xl font-bold p-2 text-white text-right">Rp {{ $products[0]['price'] }}</h3>
        </div>
        <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
          <img src="https://picsum.photos/180" alt="product image">
          <h2 class="text-xl font-bold p-2 text-white">Product Name</h2>
          <p class="text-base p-2 text-white">{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.', 55) }} <span class="text-purple-500 hover:underline"><a href="/product-detail">lihat detail &raquo;</a></span></p>
          <h3 class="text-2xl font-bold p-3 text-white text-right">Rp 50.000</h3>
        </div>
        <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
          <img src="https://picsum.photos/180" alt="product image">
          <h2 class="text-xl font-bold p-2 text-white">Product Name</h2>
          <p class="text-base p-2 text-white">{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.', 55) }} <span class="text-purple-500 hover:underline"><a href="/product-detail">lihat detail &raquo;</a></span></p>
          <h3 class="text-2xl font-bold p-3 text-white text-right">Rp 50.000</h3>
        </div>
        <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
          <img src="https://picsum.photos/180" alt="product image">
          <h2 class="text-xl font-bold p-2 text-white">Product Name</h2>
          <p class="text-base p-2 text-white">{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.', 55) }} <span class="text-purple-500 hover:underline"><a href="/product-detail">lihat detail &raquo;</a></span></p>
          <h3 class="text-2xl font-bold p-3 text-white text-right">Rp 50.000</h3>
        </div>
        <div class="m-2 p-4 flex flex-col bg-gray-800 rounded-lg">
          <img src="https://picsum.photos/180" alt="product image">
          <h2 class="text-xl font-bold p-2 text-white">Product Name</h2>
          <p class="text-base p-2 text-white">{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.', 55) }} <span class="text-purple-500 hover:underline"><a href="/product-detail">lihat detail &raquo;</a></span></p>
          <h3 class="text-2xl font-bold p-3 text-white text-right">Rp 50.000</h3>
        </div>
      </div>
    </main>
  </div>
</body>
</html>