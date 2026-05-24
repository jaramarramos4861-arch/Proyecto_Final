<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Verificar y agregar SOLO si NO existen
            if (!Schema::hasColumn('users', 'apellidos')) {
                $table->string('apellidos')->nullable()->after('name');
            }
            
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono')->nullable()->after('email');
            }
            
            if (!Schema::hasColumn('users', 'direccion')) {
                $table->string('direccion')->nullable()->after('telefono');
            }
            
            // NOTA: NO agregamos 'rol' porque ya existe en tu migración original
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['apellidos', 'telefono', 'direccion']);
        });
    }
};