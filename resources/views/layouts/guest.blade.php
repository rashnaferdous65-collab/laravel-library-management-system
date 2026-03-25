<!DOCTYPE html>
<html lang="{{ app()->getLocale() ? str_replace('_', '-', app()->getLocale()) : 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name') ?? 'Laravel' }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet"
          href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    <!-- Assets -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center pt-6 sm:pt-0">

        <!-- Logo -->
        <div class="mb-4">
            <a href="{{ url('/') }}">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current"/>
            </a>
        </div>

        <!-- Content -->
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md rounded-lg">
            {{ $slot }}
        </div>

    </div>

</body>
</html>
