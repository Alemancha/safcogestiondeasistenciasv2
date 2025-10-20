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
    Schema::create('tb_area', function (Blueprint $table) {
        $table->increments('Idarea');
        $table->string('NombreArea', 45);
        $table->string('CodigoArea', 10)->nullable();
        $table->text('Descripcion')->nullable();
        $table->tinyInteger('Estado')->default(1);
    });
}

};
