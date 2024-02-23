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
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projeto_id');
            $table->text('msg', 255);
            $table->enum('tag', ['concluído', 'aguardando', 'verificar']);
            $table->date('data_msg');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projeto_id')->references('id')->on('projetos');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacaos');
    }
};
