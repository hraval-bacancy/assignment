<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="text-xl">Login</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex mt-4">
                <div class="flex-1 text-xs text-gray-600 hover:text-gray-900">
                    By signing in, I agree to the <a class="underline" href="https://www.refineddata.com/privacy" target="_new">Privacy Policy</a> and <a class="underline" href="https://www.refineddata.com/privacy" target="_new">Terms of Service</a>.
                </div>
                <div>
                    <x-jet-button class="ml-4">
                        {{ __('Sign In') }}
                    </x-jet-button>
                </div>
            </div>

            <div class="flex items-center justify-end mt-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm" href="{{ route('password.request') }}" target="_blank">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif               
            </div>
            <div class="items-center text-center mt-10">
                <p>
                    Don't have an account?
                    <a class="underline text-sm" href="{{ route('register') }}">
                        {{ __('Sign Up Free') }}
                    </a>
                </p>                
            </div>            
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
