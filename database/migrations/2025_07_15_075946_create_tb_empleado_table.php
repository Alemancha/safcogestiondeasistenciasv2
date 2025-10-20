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
    Schema::create('tb_empleado', function (Blueprint $table) {
        $table->increments('IdEmpleado');
        $table->integer('IdContrato')->unsigned()->nullable();
        $table->integer('IdUser')->unsigned()->nullable();
        $table->string('NomEmp', 50);
        $table->string('ApellidoEmp', 50);
        $table->string('codigo_qr', 255)->nullable();
        $table->string('Area', 100)->nullable();
        $table->string('Tarea', 100)->nullable();
        $table->date('FechaIngreso')->nullable();
        $table->string('Duracion', 10)->nullable();
        $table->enum('FondoPensiones', ['ONP', 'AFP'])->nullable();
        $table->string('Telefono', 20)->nullable();
        $table->tinyInteger('Estado')->default(1);
        $table->timestamps();
    });
}


};
