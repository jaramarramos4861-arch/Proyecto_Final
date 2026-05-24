<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['name' => 'Paletas de Agua', 'Descripcion' => 'Refrescantes e hidratantes para este calor'],
            ['name' => 'Paletas de Crema', 'Descripcion' => 'Paletas cremosas por fuera, felicidad por dentro'],
            ['name' => 'De Temporada', 'Descripcion' => 'Sabores especiales y exclusivos que debes probar'],
            ['name' => 'Helados', 'Descripcion' => 'Helados cremosos en presentación de 1 litro'],
            ['name' => 'Aguas Frescas', 'Descripcion' => 'Hidratación con sabor'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
