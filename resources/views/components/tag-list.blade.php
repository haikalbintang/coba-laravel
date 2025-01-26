@php
  $genders = [
            '' => 'Semua',
            'male' => 'Pria',
            'female' => 'Wanita',
            'unisex' => 'Unisex',
            'kids' => 'Anak-anak',
          ];
@endphp

<div class="mt-auto flex flex-wrap text-sm">
  @if (strlen($product->gender) > 1)
  <p class="border py-1 px-2 border-gray-400 rounded-md">{{ $genders[$product->gender] }}</p>
  @endif
</div>