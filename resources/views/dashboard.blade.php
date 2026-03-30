<x-app-layout>
    
    {{-- Header Section --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    {{-- Main Content --}}
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="p-8 text-center">

                    <h3 class="text-lg font-semibold text-gray-700 mb-2">
                        {{ __('Welcome Back!') }}
                    </h3>

                    <p class="text-gray-600">
                        {{ __("You're logged in!") }}
                    </p>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
