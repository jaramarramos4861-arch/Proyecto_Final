<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inventarios', function (Blueprint $table) {
            if (!Schema::hasColumn('inventarios', 'imagen')) {
                $table->string('imagen')->nullable();
            }
            if (!Schema::hasColumn('inventarios', 'descripcion')) {
                $table->text('descripcion')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropColumn(['imagen', 'descripcion']);
        });
    }
};
