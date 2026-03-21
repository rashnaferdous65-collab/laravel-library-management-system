@props(['type' => 'button'])

@php
    $baseClasses = 'inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25';

    $styleClasses = 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50';
@endphp

<button {{ $attributes->merge([
    'type' => $type,
    'class' => $baseClasses . ' ' . $styleClasses
]) }}>
    {{ $slot }}
</button>
