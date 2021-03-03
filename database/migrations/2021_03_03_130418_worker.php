<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Worker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('date_born');
            $table->string('rg');
            $table->string('rg_emitter');
            $table->string('cpf');
            $table->string('phone');
            $table->string('gender');
            $table->string('breed');

            $table->string('cpf');
            $table->string('date_affiliation');
            $table->text('acting');
            $table->string('average_waste');
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
        //
    }
}
