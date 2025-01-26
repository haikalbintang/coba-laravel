@props(['categories', 'currentCategory'])

<div class="text-gray-200 pl-4 leading-tight">
    @foreach ($categories as $key => $value)
        <x-sidebar.category-item :key="$key" :value="$value" :current-category="$currentCategory" />
    @endforeach
</div>
