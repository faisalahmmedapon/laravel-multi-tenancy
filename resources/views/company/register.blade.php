<x-guest-layout>
    <form method="POST" action="{{ route('company.register') }}">
        @csrf

        <!-- Company -->
        <div>
            <x-input-label for="company" :value="__('Company')" />
            <x-text-input id="company" class="block w-full mt-1" type="text" name="company" :value="old('company')"
                autofocus autocomplete="company" />
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>
        <!-- Domain -->
        <div>
            <x-input-label for="domain" :value="__('Domain')" />
            <div class="flex justify-between">
                <x-text-input id="domain" class="block w-full mt-1" type="text" name="domain" :value="old('domain')"
                 autofocus  />

                <p class="p-3">.{{ config('tenancy.central_domains')[1] }}</p>

            </div>
            <x-input-error :messages="$errors->get('domain')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                 autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                 autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
