@props(['stock', 'currentStock'])

<p><span class="{{ $currentStock == $stock ? 'text-red-500 font-bold' : 'text-gray-500' }} text-xl">#</span> {{ $slot }}</p>