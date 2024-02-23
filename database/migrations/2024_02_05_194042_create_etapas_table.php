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
        Schema::create('etapas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projeto_id')->unsigned();
            $table->string('nome');
            $table->date('data_entrega')->nullable();
            $table->date('data_inicio')->nullable();
            $table->timestamps();

            $table->foreign('projeto_id')->references('id')->on('projetos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etapas');
    }
};
