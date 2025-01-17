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

    <aside class="w-1/4 h-screen relative overflow-y-auto pl-28 text-white bg-[#111523]">
      <x-logo></x-logo>
      <div class="pt-[120px] max-w-56 leading-7 tracking-wide font-medium">
        <h2 class="text-lg pt-2"><span class="text-red-500 text-2xl">#</span> Status</h2>
        <div class="text-gray-100 pl-4">
          <p><span class="text-red-500 text-xl">#</span> Baru</p>
          <p><span class="text-red-500 text-xl">#</span> Bekas</p>
        </div>
        <h2 class="text-lg pt-2">Gender</h2>
        <div class="text-gray-100 pl-4">
          <p>Pria</p>
          <p>Wanita</p>
          <p>Unisex</p>
        </div>
        <h2 class="text-lg pt-2">Kategori</h2>
        <div class="text-gray-100 pl-4">
          <p>Tas</p>
          <p>Baju</p>
          <p>Celana</p>
          <p>Rok</p>
          <p>Sepatu</p>
          <p>Topi</p>
          <p>Kacamata</p>
          <p>Handphone</p>
          <p>Televisi</p>
          <p>Monitor</p>
          <p>Laptop</p>
          <p>Keyboard</p>
          <p>Mouse</p>
          <p>Kursi</p>
          <p>Sofa</p>
          <p>Kasur</p>
        </div>
        <h2 class="text-lg pt-2">Kategori</h2>
        <div class="text-gray-100 pl-4">
          <p>Baru</p>
          <p>Bekas</p>
        </div>
        <p class="pt-32 text-base text-gray-300"><span class="text-red-500 text-lg">WA</span><span class="text-purple-500 text-lg">:</span> +6287877901515</p>
        <p class="pt-2 pb-8 text-base text-gray-300"><span class="text-red-500 text-lg">Lokasi</span><span class="text-purple-500 text-lg">:</span> Jl. KH Abdurrahman No. 15, RT 01/01, Pondok Jaya, Cipayung, Depok</p>
      </div>
    </aside>
  
    <main class="w-3/4 h-full overflow-y-auto pl-8 pr-48">
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