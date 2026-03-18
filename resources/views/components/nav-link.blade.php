@props(['active' => false])

@php
$baseClasses = 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none';

$activeClasses = 'border-indigo-400 text-gray-900 focus:border-indigo-700';

$inactiveClasses = 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300';

$classes = $baseClasses . ' ' . ($active ? $activeClasses : $inactiveClasses);
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
