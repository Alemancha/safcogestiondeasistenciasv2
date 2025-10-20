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
    Schema::create('tb_cargo', function (Blueprint $table) {
        $table->increments('IdCargo');
        $table->string('NombreCargo', 50);
        $table->string('DescripcionCargo', 255)->nullable();
        $table->tinyInteger('Estado')->default(1);
    });
}

};
