<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    
    protected $fillable = [
        'name',
        'Descripcion'
    ];

    // Relación con inventario
    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}
