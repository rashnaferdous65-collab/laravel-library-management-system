<section class="space-y-6">

    <!-- Header -->
    <div>
        <h2 class="text-lg font-semibold text-gray-800">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            {{ __("Update your account details and email address.") }}
        </p>
    </div>

    <!-- Email Verification Form -->
    <form id="verify-email-form" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Main Form -->
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Name" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 w-full" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 w-full" 
                :value="old('email', $user->email)" 
                required 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-3 text-sm text-gray-700">
                    <p>
                        {{ __('Email not verified yet.') }}
                    </p>

                    <button 
                        type="submit"
                        form="verify-email-form"
                        class="text-indigo-600 underline hover:text-indigo-800"
                    >
                        {{ __('Resend verification email') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-green-600 mt-2">
                            {{ __('Verification link sent successfully.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="flex items-center gap-3">
            <x-primary-button>
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <span 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-500"
                >
                    {{ __('Updated!') }}
                </span>
            @endif
        </div>

    </form>

</section>
