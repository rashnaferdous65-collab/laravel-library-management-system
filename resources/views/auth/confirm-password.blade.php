<x-guest-layout>
    
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        
        <h2 class="text-xl font-semibold text-center mb-4">
            {{ __('Confirm Your Password') }}
        </h2>

        <p class="text-sm text-gray-600 mb-6 text-center">
            {{ __('For security reasons, please confirm your password to continue.') }}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    {{ __('Enter Password') }}
                </label>

                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full mt-1 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                >

                @error('password')
                    <span class="text-red-500 text-sm mt-2 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Confirm Password') }}
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>