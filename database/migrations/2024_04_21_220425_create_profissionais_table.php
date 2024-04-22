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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->enum('profissional', ['medico', 'nutricionista', 'educador']);
            $table->string('registro')->unique();
            $table->string('cpf', 14)->unique();
            $table->date('datanasc');  
            $table->enum('genero', ['masculino', 'feminino']);
            $table->string('cep', 9);
            $table->string('telefone', 15);
            $table->string('email')->unique();
            $table->string('senha');
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
        Schema::dropIfExists('profissionais');
    }
};
