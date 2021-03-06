<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">            
            <h1 class="text-xl mt-10">Sign Up</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Preferred Language') }}" />
                <select class="form-select rounded-md shadow-sm block mt-1 w-full" name="language">
                    <option value="" selected>Select Language</option>
                    <option value="english">English</option>
                    <option value="french">French</option>                    
                </select>
            </div>

            <div class="flex -mx-0 mb-6">
                <div class="mt-4">
                    <x-jet-label value="{{ __('First Name') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" autofocus autocomplete="first_name" />
                </div>

                <div class="mt-4">
                    <x-jet-label value="{{ __('Last Name') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autofocus autocomplete="last_name" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Phone') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Company') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="company" :value="old('company')" autofocus autocomplete="company" />
            </div>

            <div class="items-center justify-end mt-4">
                <label class="flex items-center">
                    <input class="mr-2" type="checkbox" id="privacyPolicy">
                    <span class="xs">I have read and agree to the <a href="https://www.refineddata.com/privacy" class="underline text-sm text-gray-600 hover:text-gray-900" target="_new">Terms & Conditions.</a></span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4" id="registerBtn">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>