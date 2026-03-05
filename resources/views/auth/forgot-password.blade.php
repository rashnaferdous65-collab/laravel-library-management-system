<x-guest-layout>

    <div class="text-sm text-gray-600 mb-4">
        {{ __('If you forgot your password, enter your email address below. We will send you a link to reset your password.') }}
    </div>

    <!-- Session Message -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mt-2">
            <!-- Email Label -->
            <x-input-label for="email" :value="__('Email Address')" />

            <!-- Email Input -->
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="block w-full mt-1"
                :value="old('email')"
                required
                autofocus
            />

            <!-- Error Message -->
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="flex justify-end items-center mt-5">
            <x-primary-button>
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>
