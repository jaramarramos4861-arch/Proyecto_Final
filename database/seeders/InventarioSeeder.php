<?php

namespace Database\Seeders;

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
            ['nombre' => 'Paleta de Limón', 'precio' => 25.00, 'stock' => 50, 'categoria_id' => $paletasAguaId,
             'imagen' => 'limon.jpg', 'descripcion' => 'Refrescante paleta de limón natural, perfecta para el calor.'],
             
            ['nombre' => 'Paleta de Fresa (Agua)', 'precio' => 25.00, 'stock' => 45, 'categoria_id' => $paletasAguaId,
             'imagen' => 'fresa.jpg', 'descripcion' => 'Dulce y refrescante paleta de fresa con trocitos de fruta.'],
             
            ['nombre' => 'Paleta de Guayaba', 'precio' => 25.00, 'stock' => 40, 'categoria_id' => $paletasAguaId,
             'imagen' => 'guayaba.jpg', 'descripcion' => 'Exótica paleta de guayaba, sabor tropical.'],
             
            ['nombre' => 'Paleta de Sandía', 'precio' => 25.00, 'stock' => 35, 'categoria_id' => $paletasAguaId,
             'imagen' => 'sandia.jpg', 'descripcion' => 'Refrescante como un día de campo, pura sandía.'],
             
            ['nombre' => 'Paleta de Uva', 'precio' => 25.00, 'stock' => 30, 'categoria_id' => $paletasAguaId,
             'imagen' => 'uva.jpg', 'descripcion' => 'Dulce paleta de uva, sabor intenso.'],
             
            ['nombre' => 'Paleta de Chicle', 'precio' => 25.00, 'stock' => 25, 'categoria_id' => $paletasAguaId,
             'imagen' => 'chicle.jpg', 'descripcion' => 'Sabor a chicle, como las de antes.'],
             
            ['nombre' => 'Paleta de Tamarindo', 'precio' => 25.00, 'stock' => 40, 'categoria_id' => $paletasAguaId,
             'imagen' => 'tamarindo.jpg', 'descripcion' => 'Agridulce y refrescante, la favorita de muchos.'],
             
            ['nombre' => 'Paleta de Jamaica', 'precio' => 25.00, 'stock' => 35, 'categoria_id' => $paletasAguaId,
             'imagen' => 'jamaica.jpg', 'descripcion' => 'Flor de Jamaica, sabor único y refrescante.'],

            // ========== PALETAS DE CREMA ==========
            ['nombre' => 'Paleta de Vainilla', 'precio' => 32.00, 'stock' => 40, 'categoria_id' => $paletasCremaId,
             'imagen' => 'vainilla.jpg', 'descripcion' => 'Cremosa vainilla, un clásico que nunca falla.'],
             
            ['nombre' => 'Paleta de Chocochips', 'precio' => 32.00, 'stock' => 45, 'categoria_id' => $paletasCremaId,
             'imagen' => 'chocochips.jpg', 'descripcion' => 'Vainilla con trocitos de chocolate.'],
             
            ['nombre' => 'Paleta de Fresas con crema', 'precio' => 36.00, 'stock' => 45, 'categoria_id' => $paletasCremaId,
             'imagen' => 'fresascrema.jpg', 'descripcion' => 'Fresas naturales bañadas en crema.'],
             
            ['nombre' => 'Paleta de Nuez', 'precio' => 32.00, 'stock' => 30, 'categoria_id' => $paletasCremaId,
             'imagen' => 'nuez.jpg', 'descripcion' => 'Cremosa paleta con trozos de nuez.'],
             
            ['nombre' => 'Paleta de Coco', 'precio' => 32.00, 'stock' => 35, 'categoria_id' => $paletasCremaId,
             'imagen' => 'coco.jpg', 'descripcion' => 'Coco rallado con leche, sabor tropical.'],
             
            ['nombre' => 'Paleta de Cajeta', 'precio' => 32.00, 'stock' => 40, 'categoria_id' => $paletasCremaId,
             'imagen' => 'cajeta.jpg', 'descripcion' => 'Dulce de leche artesanal, sabor mexicano.'],
             
            ['nombre' => 'Paleta de Rompope', 'precio' => 32.00, 'stock' => 25, 'categoria_id' => $paletasCremaId,
             'imagen' => 'rompope.jpg', 'descripcion' => 'Sabor a rompope tradicional.'],
             
            ['nombre' => 'Paleta de Oreo', 'precio' => 32.00, 'stock' => 30, 'categoria_id' => $paletasCremaId,
             'imagen' => 'oreo.jpg', 'descripcion' => 'Galleta Oreo triturada con crema de vainilla.'],
             
            ['nombre' => 'Paleta de Ferrero', 'precio' => 34.00, 'stock' => 20, 'categoria_id' => $paletasCremaId,
             'imagen' => 'ferrero.jpg', 'descripcion' => 'Sabor a chocolate Ferrero Rocher.'],
             
            ['nombre' => 'Paleta de Pistache', 'precio' => 34.00, 'stock' => 15, 'categoria_id' => $paletasCremaId,
             'imagen' => 'pistache.jpg', 'descripcion' => 'Exclusivo sabor a pistache.'],
             
            ['nombre' => 'Paleta de Yogurt Griego', 'precio' => 36.00, 'stock' => 20, 'categoria_id' => $paletasCremaId,
             'imagen' => 'yogurt.jpg', 'descripcion' => 'Yogurt griego con frutas naturales.'],

            // ========== HELADOS (1 LITRO) ==========
            ['nombre' => 'Helado de Skwinkles (1L)', 'precio' => 135.00, 'stock' => 18, 'categoria_id' => $heladosId,
             'imagen' => 'helado_skwinkles.jpg', 'descripcion' => 'Helado sabor a Skwinkles, dulce y ácido.'],
             
            ['nombre' => 'Helado de Fresa Agua (1L)', 'precio' => 85.00, 'stock' => 15, 'categoria_id' => $heladosId,
             'imagen' => 'helado_fresa.jpg', 'descripcion' => 'Helado de fresa a base de agua, refrescante.'],
             
            ['nombre' => 'Helado de Limón (1L)', 'precio' => 80.00, 'stock' => 12, 'categoria_id' => $heladosId,
             'imagen' => 'helado_limon.jpg', 'descripcion' => 'Helado de limón, cítrico y refrescante.'],
             
            ['nombre' => 'Helado de Mango con chile (1L)', 'precio' => 85.00, 'stock' => 14, 'categoria_id' => $heladosId,
             'imagen' => 'helado_mango.jpg', 'descripcion' => 'Mango dulce con un toque de chile.'],
             
            ['nombre' => 'Helado de Oreo (1L)', 'precio' => 95.00, 'stock' => 10, 'categoria_id' => $heladosId,
             'imagen' => 'helado_oreo.jpg', 'descripcion' => 'Helado de galleta Oreo con trocitos.'],
             
            ['nombre' => 'Helado de Cajeta (1L)', 'precio' => 95.00, 'stock' => 8, 'categoria_id' => $heladosId,
             'imagen' => 'helado_cajeta.jpg', 'descripcion' => 'Helado de cajeta artesanal.'],
             
            ['nombre' => 'Helado de Fresas con crema (1L)', 'precio' => 95.00, 'stock' => 10, 'categoria_id' => $heladosId,
             'imagen' => 'helado_fresascrema.jpg', 'descripcion' => 'Fresas naturales con crema.'],
             
            ['nombre' => 'Helado de Ferrero (1L)', 'precio' => 95.00, 'stock' => 10, 'categoria_id' => $heladosId,
             'imagen' => 'helado_ferrero.jpg', 'descripcion' => 'Helado sabor a Ferrero Rocher.'],
             
            ['nombre' => 'Helado de Vainilla (1L)', 'precio' => 80.00, 'stock' => 20, 'categoria_id' => $heladosId,
             'imagen' => 'helado_vainilla.jpg', 'descripcion' => 'Helado de vainilla, el clásico de siempre.'],
             
            ['nombre' => 'Helado de Chocolate (1L)', 'precio' => 90.00, 'stock' => 15, 'categoria_id' => $heladosId,
             'imagen' => 'helado_chocolate.jpg', 'descripcion' => 'Intenso chocolate belga.'],

            // ========== AGUAS FRESCAS (1 LITRO) ==========
            ['nombre' => 'Agua de Horchata (1L)', 'precio' => 35.00, 'stock' => 30, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'horchata.jpg', 'descripcion' => 'Tradicional horchata de arroz con canela.'],
             
            ['nombre' => 'Agua de Jamaica (1L)', 'precio' => 35.00, 'stock' => 28, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'jamaica2.jpg', 'descripcion' => 'Flor de jamaica endulzada con piloncillo.'],
             
            ['nombre' => 'Agua de Limón (1L)', 'precio' => 30.00, 'stock' => 25, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'limonada.jpg', 'descripcion' => 'Limonada fresca con un toque de hierbabuena.'],
             
            ['nombre' => 'Agua de Tamarindo (1L)', 'precio' => 35.00, 'stock' => 22, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'tamarindo2.jpg', 'descripcion' => 'Agua de tamarindo, agridulce y refrescante.'],
             
            ['nombre' => 'Agua de Ciruela (1L)', 'precio' => 40.00, 'stock' => 18, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'ciruela.jpg', 'descripcion' => 'Agua de ciruela pasa, sabor único.'],
             
            ['nombre' => 'Agua de Piña (1L)', 'precio' => 40.00, 'stock' => 20, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'pina.jpg', 'descripcion' => 'Agua de piña natural, dulce y refrescante.'],
             
            ['nombre' => 'Agua de Limonada de blue berry (1L)', 'precio' => 40.00, 'stock' => 15, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'blueberry.jpg', 'descripcion' => 'Limonada con arándanos, refrescante y antioxidante.'],
             
            ['nombre' => 'Agua de Crema de coco (1L)', 'precio' => 45.00, 'stock' => 12, 'categoria_id' => $aguasFrescasId,
             'imagen' => 'coco2.jpg', 'descripcion' => 'Crema de coco, deliciosa y cremosa.'],
        ];

        foreach ($productos as $producto) {
            Inventario::create($producto);
        }
    }
}