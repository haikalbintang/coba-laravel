@php
          $statuses = [
            '' => 'Semua',
            'baru' => 'Baru',
            'bekas' => 'Bekas',
          ];
          $genders = [
            '' => 'Semua',
            'male' => 'Pria',
            'female' => 'Wanita',
            'unisex' => 'Unisex',
            'kids' => 'Anak-anak',
          ];
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
@endphp

<div class="mt-auto flex flex-wrap text-sm space-x-2">
  @if (strlen($product->status) > 1)
  <p class="border py-1 px-2 border-gray-400 rounded-md">{{ $statuses[$product->status] }}</p>
  @endif
  @if (strlen($product->gender) > 1)
  <p class="border py-1 px-2 border-gray-400 rounded-md">{{ $genders[$product->gender] }}</p>
  @endif
  @if (strlen($product->category) > 1)
  <p class="border py-1 px-2 border-gray-400 rounded-md">{{ $categories[$product->category] }}</p>
  @endif
</div>