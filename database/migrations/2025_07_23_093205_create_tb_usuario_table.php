<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_tb_usuario_table.php
// database/migrations/xxxx_xx_xx_create_tb_usuario_table.php
// database/migrations/xxxx_xx_xx_create_tb_usuario_table.php
public function up()
{
    Schema::create('tb_usuario', function (Blueprint $table) {
        $table->increments('IdUser');
        $table->string('NombreUser', 40);
        $table->string('Apellido', 45);
        $table->string('Email', 45)->unique();
        $table->string('Password', 100);
        $table->string('Imagen')->nullable();
        $table->tinyInteger('Estado')->default(1);
    });
}



};
    