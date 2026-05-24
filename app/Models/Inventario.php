<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    
    protected $fillable = [
        'nombre',
        'precio', 
        'stock',
        'imagen',
        'categoria_id'
    ];

    // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}