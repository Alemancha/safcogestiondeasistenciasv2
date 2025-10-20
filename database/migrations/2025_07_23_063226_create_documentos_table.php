<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('archivo', 255)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}

