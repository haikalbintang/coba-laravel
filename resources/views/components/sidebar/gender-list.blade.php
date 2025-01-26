@props(['genders', 'currentGender'])

<div class="text-gray-200 pl-4 leading-tight">
    @foreach ($genders as $key => $value)
        <x-sidebar.gender-item :key="$key" :value="$value" :current-gender="$currentGender" />
    @endforeach
</div>
