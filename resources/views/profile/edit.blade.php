<x-app-layout>
    {{-- Header Section --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

```
{{-- Main Content --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Profile Info Update --}}
        <section class="bg-white shadow sm:rounded-lg p-6">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        {{-- Password Update --}}
        <section class="bg-white shadow sm:rounded-lg p-6">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-password-form')
            </div>
        </section>

        {{-- Delete Account --}}
        <section class="bg-white shadow sm:rounded-lg p-6">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.delete-user-form')
            </div>
        </section>

    </div>
</div>
```

</x-app-layout>

