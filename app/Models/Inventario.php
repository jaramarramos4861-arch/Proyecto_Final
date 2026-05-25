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
        'descripcion',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}