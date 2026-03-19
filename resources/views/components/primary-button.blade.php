@props(['type' => 'submit'])

@php
    $baseClasses = 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $colorClasses = 'bg-gray-800 text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500';
    
    $classes = $baseClasses . ' ' . $colorClasses;
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
    {{ $slot }}
</button>