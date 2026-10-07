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
        Schema::create('solicitacao_manutencao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionario')->onDelete('cascade');
            $table->unsignedBigInteger('bloco_id'); 
            $table->foreign('bloco_id')->references('id')->on('bloco')->onDelete('cascade');
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
            $table->unsignedBigInteger('status_manutencao_id');
            $table->foreign('status_manutencao_id')->references('id')->on('status_manutencao')->onDelete('cascade');
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitacao_manutencao', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropColumn('usuario_id');
            $table->dropForeign(['funcionario_id']);
            $table->dropColumn('funcionario_id');
            $table->dropForeign(['bloco_id']);
            $table->dropColumn('bloco_id');
            $table->dropForeign(['sala_id']);
            $table->dropColumn('sala_id');
            $table->dropForeign(['status_manutencao_id']);
            $table->dropColumn('status_manutencao_id');
        });

        Schema::dropIfExists('solicitacao_manutencao');
    }
};
