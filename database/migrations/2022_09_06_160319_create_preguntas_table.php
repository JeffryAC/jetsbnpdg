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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->string('estado');
            $table->unsignedBigInteger('modificado_por')->nullable();
            $table->unsignedBigInteger('creado_por');
            $table->timestamps();

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
        Schema::dropIfExists('preguntas');
    }
};
