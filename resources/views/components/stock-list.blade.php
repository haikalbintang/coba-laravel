@props(['stocks', 'currentStock'])

<div class="text-gray-200 pl-4 leading-tight">
    @foreach ($stocks as $key => $value)
        <x-stock-item :key="$key" :value="$value" :current-stock="$currentStock" />
    @endforeach
</div>
