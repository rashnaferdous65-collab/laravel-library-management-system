<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>

@include('home.header')

<div class="currently-market">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <x-guest-layout>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mt-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input 
                                id="name"
                                name="name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="block mt-1 w-full"
                                :value="old('email')"
                                required
                                autocomplete="username"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" value="Phone Number" />
                            <x-text-input
                                id="phone"
                                name="phone"
                                type="text"
                                class="block mt-1 w-full"
                                placeholder="Enter phone number"
                            />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="address" value="Address" />
                            <x-text-input
                                id="address"
                                name="address"
                                type="text"
                                class="block mt-1 w-full"
                                placeholder="Enter your address"
                            />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="block mt-1 w-full"
                                required
                                autocomplete="new-password"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                class="block mt-1 w-full"
                                required
                                autocomplete="new-password"
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Button -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('login') }}"
                               class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>

                    </form>

                </x-guest-layout>

            </div>
        </div>
    </div>
</div>

@include('home.footer')

</body>
</html>
