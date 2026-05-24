<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\Categoria;

class InventarioSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener IDs de categorías
        $paletasAguaId = Categoria::where('name', 'Paletas de Agua')->first()->id;
        $paletasCremaId = Categoria::where('name', 'Paletas de Crema')->first()->id;
        $temporadaId = Categoria::where('name', 'De Temporada')->first()->id;
        $heladosId = Categoria::where('name', 'Helados')->first()->id;
        $aguasFrescasId = Categoria::where('name', 'Aguas Frescas')->first()->id;

        $productos = [
            // ========== PALETAS DE AGUA ==========
            ['nombre' => 'Paleta de Limón', 'precio' => 25.00, 'stock' => 50, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Fresa (Agua)', 'precio' => 25.00, 'stock' => 45, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Guayaba', 'precio' => 25.00, 'stock' => 40, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Sandía', 'precio' => 25.00, 'stock' => 35, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Kiwifresa', 'precio' => 25.00, 'stock' => 30, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Uva', 'precio' => 25.00, 'stock' => 25, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Chicle', 'precio' => 25.00, 'stock' => 20, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Sandía', 'precio' => 25.00, 'stock' => 15, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Tamarindo', 'precio' => 25.00, 'stock' => 40, 'categoria_id' => $paletasAguaId],
            ['nombre' => 'Paleta de Jamaica', 'precio' => 25.00, 'stock' => 35, 'categoria_id' => $paletasAguaId],

            // ========== PALETAS DE CREMA ==========
            ['nombre' => 'Paleta de Vainilla', 'precio' => 32.00, 'stock' => 40, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Chocochips', 'precio' => 32.00, 'stock' => 45, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Fresas con crema', 'precio' => 36.00, 'stock' => 45, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Nuez', 'precio' => 32.00, 'stock' => 30, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Coco', 'precio' => 32.00, 'stock' => 35, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Cajeta', 'precio' => 32.00, 'stock' => 40, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Rompope', 'precio' => 32.00, 'stock' => 25, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Oreo', 'precio' => 32.00, 'stock' => 30, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Ferrero', 'precio' => 34.00, 'stock' => 20, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Pistache', 'precio' => 34.00, 'stock' => 15, 'categoria_id' => $paletasCremaId],
            ['nombre' => 'Paleta de Yogurt Griego', 'precio' => 36.00, 'stock' => 20, 'categoria_id' => $paletasCremaId],


            // ========== PALETAS DE TEMPORADA ==========
            ['nombre' => 'Paleta de Tejuino', 'precio' => 30.00, 'stock' => 20, 'categoria_id' => $temporadaId],
            ['nombre' => 'Paleta de Skwinkles', 'precio' => 36.00, 'stock' => 15, 'categoria_id' => $temporadaId],
            ['nombre' => 'Paleta de Pica fresa', 'precio' => 34.00, 'stock' => 10, 'categoria_id' => $temporadaId],
            ['nombre' => 'Paleta de Pingüinos', 'precio' => 36.00, 'stock' => 12, 'categoria_id' => $temporadaId],
            ['nombre' => 'Paleta de Chongos Zamoranos', 'precio' => 34.00, 'stock' => 18, 'categoria_id' => $temporadaId],

            // ========== HELADOS ==========
            ['nombre' => 'Helado de Skwinkles(1L)', 'precio' => 80.00, 'stock' => 18, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Fresa (1L)', 'precio' => 80.00, 'stock' => 15, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Limón (1L)', 'precio' => 80.00, 'stock' => 12, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Mango con chile (1L)', 'precio' => 80.00, 'stock' => 14, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Oreo (1L)', 'precio' => 85.00, 'stock' => 10, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Cajeta (1L)', 'precio' => 90.00, 'stock' => 8, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Galleta (1L)', 'precio' => 90.00, 'stock' => 10, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Ferrero (1L)', 'precio' => 90.00, 'stock' => 10, 'categoria_id' => $heladosId],
            ['nombre' => 'Helado de Vainilla (1L)', 'precio' => 80.00, 'stock' => 20, 'categoria_id' => $heladosId],

            // ========== AGUAS FRESCAS ==========
            ['nombre' => 'Agua de Horchata (1L)', 'precio' => 35.00, 'stock' => 30, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Jamaica (1L)', 'precio' => 35.00, 'stock' => 28, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Limón (1L)', 'precio' => 30.00, 'stock' => 25, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Tamarindo (1L)', 'precio' => 35.00, 'stock' => 22, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Sandía (1L)', 'precio' => 40.00, 'stock' => 18, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Mango (1L)', 'precio' => 40.00, 'stock' => 20, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Limonada de blue berry (1L)', 'precio' => 40.00, 'stock' => 15, 'categoria_id' => $aguasFrescasId],
            ['nombre' => 'Agua de Crema de coco(1L)', 'precio' => 45.00, 'stock' => 12, 'categoria_id' => $aguasFrescasId],
        ];

        foreach ($productos as $producto) {
            Inventario::create($producto);
        }
    }
}