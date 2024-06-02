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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->unsignedBigInteger('agenda_id');  
            $table->unsignedBigInteger('paciente_id');      
            $table->foreign('paciente_id', 'fk_consultas_pacientes')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade');
            $table->foreign('agenda_id', 'fk_consultas_agendas')
                ->references('id')
                ->on('agendas')
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
        Schema::dropIfExists('consultas');
    }
};
