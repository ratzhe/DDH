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
        Schema::create('treinos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->text('treino_1');
            $table->text('treino_2');
            $table->text('treino_3');
            $table->text('treino_4');
            $table->text('treino_5');
            $table->foreign('paciente_id', 'fk_treinos_pacientes')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treinos');
    }
};
