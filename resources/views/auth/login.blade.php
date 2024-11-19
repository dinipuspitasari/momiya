<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo class="mb-6" />
        </x-slot>

        <div class="bg-white shadow-md rounded-lg p-8 sm:p-10">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Masuk ke Akun Anda</h2>
            
            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <x-button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
