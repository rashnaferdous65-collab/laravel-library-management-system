@props(['value'])

@php
    $labelText = $value ? $value : $slot;
@endphp

<label {{ $attributes->class(['block font-medium text-sm text-gray-700']) }}>
    {{ $labelText }}
</label>