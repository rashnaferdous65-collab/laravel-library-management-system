<x-guest-layout>

    <!-- Email Verification Message -->
    <div class="mb-4 text-sm text-gray-700">
        {{ __('Thank you for registering! Before continuing, please confirm your email address by clicking the verification link we sent to your email. If you did not receive the email, you can request another one.') }}
    </div>

    <!-- Success Message -->
    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 text-sm font-semibold text-green-600">
            {{ __('A fresh verification link has been sent to your registered email address.') }}
        </div>
    @endif

    <div class="mt-6 flex items-center justify-between">

        <!-- Resend Email Form -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                {{ __('Send Verification Link Again') }}
            </x-primary-button>
        </form>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="text-sm underline text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md">
                {{ __('Logout') }}
            </button>
        </form>

    </div>

</x-guest-layout>
