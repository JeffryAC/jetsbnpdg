<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->binary('data');
            $table->string('descripcion');
            $table->string('estado');
            $table->unsignedBigInteger('modificado_por')->nullable();
            $table->unsignedBigInteger('creado_por');
            $table->unsignedBigInteger('dependencia')->nullable();
            $table->unsignedBigInteger('tipo_doc');
            $table->timestamps();
            $table->ipAddress('ip');

            $table->foreign('dependencia')->references('id')
             ->on('dependencias')->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('tipo_doc')->references('id')
              ->on('tipodocs')->onUpdate('cascade')->onDelete('cascade');

              $table->foreign('modificado_por')->references('id')
           ->on('users')->onUpdate('cascade')->onDelete('cascade');

           $table->foreign('creado_por')->references('id')
           ->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
};
