<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'apellidos')) {
                $table->string('apellidos')->nullable();
            }
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono')->nullable();
            }
            if (!Schema::hasColumn('users', 'direccion')) {
                $table->string('direccion')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['apellidos', 'telefono', 'direccion']);
        });
    }
};