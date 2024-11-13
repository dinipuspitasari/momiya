<?php

// namespace Tests\Feature;

// use App\Models\User;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
// use Livewire\Livewire;
// use Tests\TestCase;

// class ProfileInformationTest extends TestCase
// {
//     use RefreshDatabase;

//     public function test_current_profile_information_is_available(): void
//     {
//         $this->actingAs($user = User::factory()->create());

//         $component = Livewire::test(UpdateProfileInformationForm::class);

//         $this->assertEquals($user->name, $component->state['name']);
//         $this->assertEquals($user->email, $component->state['email']);
//     }

//     public function test_profile_information_can_be_updated(): void
//     {
//         $this->actingAs($user = User::factory()->create());

//         Livewire::test(UpdateProfileInformationForm::class)
//             ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com'])
//             ->call('updateProfileInformation');

//         $this->assertEquals('Test Name', $user->fresh()->name);
//         $this->assertEquals('test@example.com', $user->fresh()->email);
//     }
// }

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available(): void
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        // Memastikan field yang ada pada state sesuai dengan data user
        $this->assertEquals($user->name, $component->state['name']);
        $this->assertEquals($user->email, $component->state['email']);
        $this->assertEquals($user->nik, $component->state['nik']);
        $this->assertEquals($user->no_kk, $component->state['no_kk']);
        $this->assertEquals($user->no_telp, $component->state['no_telp']);
        $this->assertEquals($user->alamat, $component->state['alamat']);
    }

    public function test_profile_information_can_be_updated(): void
    {
        $this->actingAs($user = User::factory()->create());

        // Set data untuk melakukan update pada state
        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state', [
                'name' => 'Test Name',
                'email' => 'test@example.com',
                'nik' => '1234567890123456',
                'no_kk' => '1234567890123456',
                'no_telp' => '081234567890',
                'alamat' => 'Jalan Test No. 123'
            ])
            ->call('updateProfileInformation');

        // Memastikan bahwa perubahan berhasil disimpan di database
        $this->assertEquals('Test Name', $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
        $this->assertEquals('1234567890123456', $user->fresh()->nik);
        $this->assertEquals('1234567890123456', $user->fresh()->no_kk);
        $this->assertEquals('081234567890', $user->fresh()->no_telp);
        $this->assertEquals('Jalan Test No. 123', $user->fresh()->alamat);
    }
}

