<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etapa_id');
            $table->unsignedBigInteger('projeto_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->integer('codigo_id')->nullable();
            $table->date('data_entrega')->nullable();
            $table->date('data_entrega_autor')->nullable();
            $table->string('autor')->nullable();
            $table->boolean('status')->default('0');
            $table->string('area_conhecimento')->nullable();
            $table->boolean('simulado')->default('1');
            $table->boolean('imagem')->default('1');
            $table->boolean('manual')->default('1');
            $table->timestamps();

            $table->foreign('etapa_id')->references('id')->on('etapas');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
