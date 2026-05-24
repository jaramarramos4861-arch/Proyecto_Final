<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Administrador
        User::create([
            'name' => 'Admin',
            'apellidos' => 'Sistema',
            'email' => 'admin@paleteria.com',
            'password' => Hash::make('admin123'),
            'telefono' => '5551234567',
            'direccion' => 'Administración',
            'rol' => 'admin'
        ]);

    }
}