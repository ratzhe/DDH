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
        Schema::table('agendas', function (Blueprint $table) {
            if (!Schema::hasColumn('agendas', 'protocolo_id')) {
                $table->unsignedBigInteger('protocolo_id')->nullable();
            }
            
            $table->foreign('protocolo_id')
                ->references('id')
                ->on('protocolos')
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
        Schema::table('agendas', function (Blueprint $table) {
            // Remove a chave estrangeira
            $table->dropForeign(['protocolo_id']);

            // Remove a coluna 'protocolo_id' se necessário
            $table->dropColumn('protocolo_id');
        });
    }
};
