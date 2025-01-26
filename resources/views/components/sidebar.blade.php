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
          $categories = [
            '' => 'Semua',
            'tas' => 'Tas',
            'baju' => 'Baju',
            'celana' => 'Celana',
            'rok' => 'Rok',
            'sepatu' => 'Sepatu',
            'topi' => 'Topi',
            'kacamata' => 'Kacamata',
            'handphone' => 'Handphone',
            'televisi' => 'Televisi',
            'monitor' => 'Monitor',
            'laptop' => 'Laptop',
            'keyboard' => 'Keyboard',
            'mouse' => 'Mouse',
            'kursi' => 'Kursi',
            'sofa' => 'Sofa',
            'kasur' => 'Kasur',
            'meja' => 'Meja',
            'lainnya' => 'Lainnya',
          ];
          $currentCategory = request('category', '');
          $statuses = [
            '' => 'Semua',
            'baru' => 'Baru',
            'bekas' => 'Bekas',
          ];
          $currentStatus = request('status', '');
        @endphp
        <div class="tracking-wider">
          <x-category1>Stok</x-category1>
          <x-stock-list :stocks="$stocks" :current-stock="$currentStock"></x-stock-list>
  
          <x-category1>Status</x-category1>
          <x-sidebar.status-list :statuses="$statuses" :current-status="$currentStatus"></x-sidebar.status-list>
  
          <x-category1>Gender</x-category1>
          <x-gender-list :genders="$genders" :current-gender="$currentGender"></x-gender-list>
  
          <x-category1>Kategori</x-category1>
          <x-sidebar.category-list :categories="$categories" :current-category="$currentCategory"></x-sidebar.category-list>
        </div>

        <p class="pt-32 text-base text-gray-100"><span class="text-red-500 text-lg font-semibold">WA</span><span class="text-purple-500 text-lg"></span> +6287877901515</p>
        <p class="pt-2 pb-8 text-base text-gray-100"><span class="text-red-500 text-lg font-semibold">Lokasi</span><span class="text-purple-500 text-lg"></span> Jl. KH Abdurrahman No. 15, RT 01/01, Pondok Jaya, Cipayung, Depok</p>

        <div class="text-sm py-8 pl-1.5">
          <p class="text-gray-100">&copy; {{ date('Y') }} <span class="text-gray-400">by</span> <span class="text-red-500 font-bold text-[16px]">Toko Laravel</span></p>
        </div>
      </div>