<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIdFieldsFromTbContrato extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tb_contrato', function (Blueprint $table) {
            // Verifica primero que existan los campos antes de borrarlos
            if (Schema::hasColumn('tb_contrato', 'IdHorario')) {
                $table->dropColumn('IdHorario');
            }
            if (Schema::hasColumn('tb_contrato', 'IdTurno')) {
                $table->dropColumn('IdTurno');
            }
            if (Schema::hasColumn('tb_contrato', 'IdFrecuencia')) {
                $table->dropColumn('IdFrecuencia');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tb_contrato', function (Blueprint $table) {
            $table->integer('IdHorario')->unsigned()->nullable();
            $table->integer('IdTurno')->unsigned()->nullable();
            $table->integer('IdFrecuencia')->unsigned()->nullable();
        });
    }
}
