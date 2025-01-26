@props(['statuses', 'currentStatus'])

<div class="text-gray-200 pl-4 leading-tight">
    @foreach ($statuses as $key => $value)
        <x-sidebar.status-item :key="$key" :value="$value" :current-status="$currentStatus" />
    @endforeach
</div>
