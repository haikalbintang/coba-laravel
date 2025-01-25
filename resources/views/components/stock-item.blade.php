@props(['key', 'value', 'currentStock'])

<p>
    <span class="{{ $currentStock == $key ? 'text-red-500 font-bold' : 'text-gray-500' }} text-xl">
        #
    </span>
    <a href="{{ route('products.index', [...request()->query(), 'stock' => $key]) }}"
       class="{{ $currentStock == $key ? 'text-white font-bold' : '' }}">
        {{ $value }}
    </a>
</p>
