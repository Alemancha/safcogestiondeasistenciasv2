<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbContratoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_contrato', function (Blueprint $table) {
            $table->increments('IdContrato');
            $table->integer('IdHorario')->unsigned();
            $table->integer('IdTurno')->unsigned();
            $table->integer('IdFrecuencia')->unsigned();
            $table->string('PeriodoContr', 50)->nullable();
            $table->date('Fecha_inicioContr')->nullable();
            $table->date('Fecha_FinContr')->nullable();
            $table->date('Fecha_Firma')->nullable();
            $table->decimal('SueldoContr', 10, 2)->nullable();
            $table->char('Moneda', 3)->nullable();
            $table->string('TipoContrato', 50)->nullable();
            $table->timestamps();
            $table->string('Horario', 50)->nullable();
            $table->string('Turno', 20)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_contrato');
    }
}

