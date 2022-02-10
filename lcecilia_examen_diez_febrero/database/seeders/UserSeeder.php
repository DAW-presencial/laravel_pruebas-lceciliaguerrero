<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::create([
            'name' => 'Laura Cecilia Guerrero',
            'email' => 'lcecilia@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('adminSecretos'),
            'remember_token' => Str::random(10),
        ]);

        $userInvitado = User::create([
            'name' => 'Invitado',
            'email' => 'invitado@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('invitadoSecretos'),
            'remember_token' => Str::random(10),
        ]);
        $userUsuario = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('usuarioSecretos'),
            'remember_token' => Str::random(10),
        ]);
    }
}
