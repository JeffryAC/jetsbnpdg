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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->string('parametro')->unique();
            $table->string('valor');
            $table->unsignedBigInteger('modificado_por')->nullable();
            $table->unsignedBigInteger('creado_por');
            $table->timestamps();
            $table->string('estado');
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
        Schema::dropIfExists('parametros');
    }
};
