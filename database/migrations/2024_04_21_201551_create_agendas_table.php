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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->unsignedBigInteger('profissional_id');
            //$table->string('profissional_type');
            $table->timestamps();
            // Adicione as chaves estrangeiras com nomes exclusivos
            $table->foreign('profissional_id', 'fk_agendas_profissionais')
                ->references('id')
                ->on('profissionais')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
