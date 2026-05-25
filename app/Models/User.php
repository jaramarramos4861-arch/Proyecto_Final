<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'apellidos', 'email', 'password', 'telefono', 'direccion', 'rol'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /*=
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // Método para verificar si el usuario es administrador
    public function isAdmin(): bool
    {
        return $this->rol === 'admin';
    }
    
    // Método para verificar si el usuario es cliente
    public function isCliente(): bool
    {
        return $this->rol === 'cliente';
    }
    
    // Nombre completo del usuario
    public function getNombreCompletoAttribute(): string
    {
        return $this->name . ' ' . $this->apellidos;
    }
}