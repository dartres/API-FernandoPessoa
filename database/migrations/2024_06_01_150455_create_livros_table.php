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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('id_autor');
            $table->string('idioma');
            $table->integer('lancamento')->nullable();
            $table->string('tipo');
            $table->string('link')->nullable();
            $table->unsignedBigInteger('id_imagem')->nullable();
            $table->timestamps();

            $table->foreign('id_imagem')->references('id')->on('imagens');
            $table->foreign('id_autor')->references('id')->on('autors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
