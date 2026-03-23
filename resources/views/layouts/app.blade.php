<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name') ?? 'Laravel' }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    {{-- Assets --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="font-sans antialiased bg-gray-100">
    
    {{-- Wrapper --}}
    <div class="min-h-screen flex flex-col">

        {{-- Navigation --}}
        @includeIf('layouts.navigation')

        {{-- Header --}}
        @if(isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        {{-- Main Content --}}
        <main class="flex-1">
            {{ $slot }}
        </main>

    </div>

</body>
</html>
