<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nik' => ['required', 'string', 'size:16', Rule::unique('users')->ignore($user->id)], // Validasi NIK
            'no_kk' => ['required', 'string', 'size:16'], // Validasi No KK
            'no_telp' => ['required', 'string', 'max:15'], // Validasi No Telp
            'alamat' => ['required', 'string', 'max:255'], // Validasi Alamat
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        // Jika ada foto yang diupload, simpan perubahan foto
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // Jika email berubah dan user harus verifikasi email, reset status verifikasi email
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // Update informasi profil pengguna termasuk nik, no_kk, no_telp, dan alamat
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'nik' => $input['nik'],
                'no_kk' => $input['no_kk'],
                'no_telp' => $input['no_telp'],
                'alamat' => $input['alamat'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'nik' => $input['nik'],
            'no_kk' => $input['no_kk'],
            'no_telp' => $input['no_telp'],
            'alamat' => $input['alamat'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
