<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// En tu archivo de migración (por ejemplo, database/migrations/2024_07_25_000000_create_asistencias_table.php)
public function up()
{
    Schema::create('asistencias', function (Blueprint $table) {
        $table->id();
        $table->string('codigo_qr', 50); // CAMBIA esto (antes era 'codigo')
        $table->string('empleado', 100)->nullable();
        $table->string('documento', 20)->nullable();
        $table->date('fecha');
        $table->time('hora');
        $table->string('tipo_marcacion', 20)->nullable();
        $table->timestamps();
    });
}


};
