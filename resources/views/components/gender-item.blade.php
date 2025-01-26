@props(['key', 'value', 'currentGender'])

<p>
    <span class="{{ $currentGender == $key ? 'pl-3 text-red-500 font-bold' : 'text-gray-500' }} text-xl">
        #
    </span>
    <a href="{{ route('products.index', [...request()->query(), 'gender' => $key]) }}" class="{{ $currentGender == $key ? 'text-white font-bold' : '' }}">
        {{ $value }}
    </a>
</p>
