<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo class="mb-6" />
        </x-slot>

        <div class="bg-white shadow-lg rounded-lg p-8 sm:p-10">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Daftar Akun Baru</h2>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" value="{{ __('Nama Lengkap') }}" />
                    <x-input id="name" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- NIK -->
                <div>
                    <x-label for="nik" value="{{ __('NIK') }}" />
                    <x-input id="nik" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="text" name="nik" :value="old('nik')" required autocomplete="nik" />
                </div>

                <!-- No KK -->
                <div>
                    <x-label for="no_kk" value="{{ __('No KK') }}" />
                    <x-input id="no_kk" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="text" name="no_kk" :value="old('no_kk')" required autocomplete="no_kk" />
                </div>

                <!-- No Telp -->
                <div class="sm:col-span-2">
                    <x-label for="no_telp" value="{{ __('No Telp') }}" />
                    <x-input id="no_telp" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                    type="number" name="no_telp" :value="old('no_telp')" required autocomplete="no_telp" />
                </div>

                <!-- Alamat -->
                <div class="sm:col-span-2">
                    <x-label for="alamat" value="{{ __('Alamat') }}" />
                    <x-input id="alamat" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="text" name="alamat" :value="old('alamat')" required autocomplete="alamat" />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                    <x-input id="password_confirmation" class="mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" 
                             type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="sm:col-span-2">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <span class="ml-2 text-sm text-gray-600">
                                    {!! __('Saya setuju dengan :terms_of_service dan :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Syarat Layanan').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Kebijakan Privasi').'</a>',
                                    ]) !!}
                                </span>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="sm:col-span-2 flex items-center justify-between">
                    <p class="text-sm text-gray-600">Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">
                            Masuk
                        </a>
                    </p>

                    <x-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg">
                        {{ __('Daftar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
