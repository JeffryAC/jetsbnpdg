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
        Schema::create('historial_passwords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('password');
            $table->timestamps();

            // $table->foreign('modificado_por')->references('id')
            // ->on('users')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('creado_por')->references('id')
            // ->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_passwords');
    }
};
