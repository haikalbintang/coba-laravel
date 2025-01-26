@props(['genders', 'currentGender'])

<div class="text-gray-200 pl-4">
    @foreach ($genders as $key => $value)
        <x-gender-item :key="$key" :value="$value" :current-gender="$currentGender" />
    @endforeach
</div>
