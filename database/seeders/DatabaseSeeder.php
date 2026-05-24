<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@paleteria.com',
            'password' => bcrypt('admin123'),
            'rol' => 'admin',
        ]);

        // Crear usuario cliente de prueba
        User::create([
            'name' => 'Cliente Prueba',
            'email' => 'cliente@paleteria.com',
            'password' => bcrypt('cliente123'),
            'rol' => 'cliente',
        ]);

        // Ejecutar los seeders de categorías y productos
        $this->call([
            CategoriaSeeder::class,
            InventarioSeeder::class,
        ]);
    }
}