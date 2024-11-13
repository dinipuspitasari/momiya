<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik' => ['required', 'string', 'size:16', 'unique:users'], // Validasi NIK
            'no_kk' => ['required', 'string', 'size:16'], // Validasi No KK
            'alamat'=> ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'numeric'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'nik' => $input['nik'],
            'no_kk' => $input['no_kk'],
            'alamat' => $input['alamat'],
            'no_telp' => $input['no_telp'],
            'level_id' => 3,
            'password' => Hash::make($input['password']),
        ]);
    }
}
