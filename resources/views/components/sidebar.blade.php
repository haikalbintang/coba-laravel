<x-logo></x-logo>
      <div class="pt-[120px] max-w-56 leading-7 tracking-wide font-normal text-gray-200">
        @php
          $stocks = [
            '' => 'Semua',
            'available' => 'Tersedia',
            'sold' => 'Terjual'
      ];
          $currentStock = request('stock', '');
          $genders = [
            '' => 'Semua',
            'male' => 'Pria',
            'female' => 'Wanita',
            'unisex' => 'Unisex',
            'kids' => 'Anak-anak',
          ];
          $currentGender = request('gender', '');
        @endphp
        <x-category1>Stok</x-category1>
        <x-stock-list :stocks="$stocks" :current-stock="$currentStock"></x-stock-list>
        {{-- <x-category1>Status</x-category1>
        <div class="text-gray-200 pl-4">
          <x-category2><a href="{{ route('products.index', ['status' => 'baru']) }}" class="{{ request('status') == 'baru' ? 'text-white font-bold' : '' }}">Baru</a></x-category2>
          <x-category2><a href="{{ route('products.index', ['status' => 'bekas']) }}" class="{{ request('status') == 'bekas' ? 'text-white font-bold' : '' }}">Bekas</a></x-category2>
        </div> --}}
        <x-category1>Gender</x-category1>
        <x-gender-list :genders="$genders" :current-gender="$currentGender"></x-gender-list>
        <h2 class="text-lg pt-2">Kategori</h2>
        <div class="text-gray-200 pl-4">
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
        <p class="pt-32 text-base text-gray-100"><span class="text-red-500 text-lg font-semibold">WA</span><span class="text-purple-500 text-lg"></span> +6287877901515</p>
        <p class="pt-2 pb-8 text-base text-gray-100"><span class="text-red-500 text-lg font-semibold">Lokasi</span><span class="text-purple-500 text-lg"></span> Jl. KH Abdurrahman No. 15, RT 01/01, Pondok Jaya, Cipayung, Depok</p>

        <div class="text-sm py-8 pl-1.5">
          <p class="text-gray-100">&copy; {{ date('Y') }} <span class="text-gray-400">by</span> <span class="text-red-500 font-bold text-[16px]">Toko Laravel</span></p>
        </div>
      </div>