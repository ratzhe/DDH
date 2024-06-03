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
        Schema::table('treinos', function (Blueprint $table) {
            $table->integer('rep_1');
            $table->integer('serie_1');
            $table->integer('rep_2');
            $table->integer('serie_2');
            $table->integer('rep_3');
            $table->integer('serie_3');
            $table->integer('rep_4');
            $table->integer('serie_4');
            $table->integer('rep_5');
            $table->integer('serie_5');
            $table->integer('rep_6');
            $table->integer('serie_6');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treinos', function (Blueprint $table) {
            $table->integer('rep_1');
            $table->integer('serie_1');
            $table->integer('rep_2');
            $table->integer('serie_2');
            $table->integer('rep_3');
            $table->integer('serie_3');
            $table->integer('rep_4');
            $table->integer('serie_4');
            $table->integer('rep_5');
            $table->integer('serie_5');
            $table->integer('rep_6');
            $table->integer('serie_6');
        });
    }
};
