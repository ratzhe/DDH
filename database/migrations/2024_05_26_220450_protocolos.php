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
        Schema::create('protocolos', function (Blueprint $table) {
            $table->id();
            $table->string('especialidade');
            $table->unsignedBigInteger('profissional_id');      
            $table->timestamps();
            $table->foreign('profissional_id', 'fk_protocolos_profissionais')
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
        Schema::dropIfExists('protocolos');
    }
};
