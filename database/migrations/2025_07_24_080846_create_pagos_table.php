<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('pagos', function (Blueprint $table) {
        $table->id('IdPago');
        $table->unsignedBigInteger('IdEmpleado');
        $table->unsignedBigInteger('IdTipoPago');
        $table->decimal('Monto', 10, 2);
        $table->char('Moneda', 3);
        $table->date('Fecha_pago');
        $table->string('TipoCompensacion', 50)->nullable();
        $table->string('Observacion', 200)->nullable();
        $table->timestamps();
    });
}

};
