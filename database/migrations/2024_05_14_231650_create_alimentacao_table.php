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
        Schema::create('alimentacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->text('cafe_1');
            $table->text('cafe_2')->nullable();
            $table->text('cafe_3')->nullable();
            $table->text('lanche_m_1');
            $table->text('lanche_m_2')->nullable();
            $table->text('lanche_m_3')->nullable();
            $table->text('almoco_1');
            $table->text('almoco_2')->nullable();
            $table->text('almoco_3')->nullable();
            $table->text('lanche_1');
            $table->text('lanche_2')->nullable();
            $table->text('lanche_3')->nullable();
            $table->text('jantar_1');
            $table->text('jantar_2')->nullable();
            $table->text('jantar_3')->nullable();
            $table->text('ceia_1');
            $table->text('ceia_2')->nullable();
            $table->text('ceia_3')->nullable();
            //$table->string('profissional_type');
            $table->timestamps();
            // Adicione as chaves estrangeiras com nomes exclusivos
            $table->foreign('paciente_id', 'fk_alimentacao_pacientes')
                ->references('id')
                ->on('pacientes')
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
        Schema::dropIfExists('alimentacao');
    }
};
