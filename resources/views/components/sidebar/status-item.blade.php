@props(['key', 'value', 'currentStatus'])

<p>
    <span class="{{ $currentStatus == $key ? 'pl-3 text-red-500 font-bold' : 'text-gray-500' }} text-xl">
        #
    </span>
    <a href="{{ route('products.index', [...request()->query(), 'status' => $key]) }}" class="{{ $currentStatus == $key ? 'text-white font-bold' : '' }}">
        {{ $value }}
    </a>
</p>