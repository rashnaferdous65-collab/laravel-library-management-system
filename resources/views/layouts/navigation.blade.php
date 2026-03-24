@php
    $user = Auth::user();
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Left Side --}}
            <div class="flex items-center space-x-6">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-9 w-auto text-gray-800" />
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden sm:flex space-x-6">
                    <x-nav-link 
                        :href="route('dashboard')" 
                        :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

            </div>

            {{-- Right Side --}}
            <div class="hidden sm:flex items-center space-x-4">

                <x-dropdown align="right" width="48">

                    {{-- Trigger --}}
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm text-gray-600 hover:text-gray-800 transition">

                            <span>{{ $user->name }}</span>

                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                    </x-slot>

                    {{-- Dropdown Content --}}
                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link 
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Mobile Toggle --}}
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-500 hover:bg-gray-100 transition">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="sm:hidden px-4 pb-4 space-y-2">

        <x-responsive-nav-link 
            :href="route('dashboard')" 
            :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        <div class="border-t pt-3 mt-3">

            <div class="text-gray-800 font-medium">{{ $user->name }}</div>
            <div class="text-gray-500 text-sm">{{ $user->email }}</div>

            <div class="mt-2 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link 
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>

    </div>

</nav>
