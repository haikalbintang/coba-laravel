@props(['key', 'value', 'currentCategory'])

<p>
    <span class="{{ $currentCategory == $key ? 'pl-3 text-red-500 font-bold' : 'text-gray-500' }} text-xl">
        #
    </span>
    <a href="{{ route('products.index', [...request()->query(), 'category' => $key]) }}" class="{{ $currentCategory == $key ? 'text-white font-bold' : '' }}">
        {{ $value }}
    </a>
</p>