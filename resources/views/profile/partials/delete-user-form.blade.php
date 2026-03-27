<section class="space-y-6">

    <div>
        <h2 class="text-lg font-semibold text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            {{ __('Deleting your account will permanently remove all associated data. Please ensure you have saved anything important before proceeding.') }}
        </p>
    </div>

    <div>
        <x-danger-button
            x-data
            @click.prevent="$dispatch('open-modal', 'delete-account-modal')"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="delete-account-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('DELETE')

            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Confirm Account Deletion') }}
            </h3>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('This action is irreversible. Please enter your password to confirm deletion.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block mt-1 w-3/4"
                    placeholder="{{ __('Enter your password') }}"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Confirm Delete') }}
                </x-danger-button>
            </div>

        </form>

    </x-modal>

</section>
