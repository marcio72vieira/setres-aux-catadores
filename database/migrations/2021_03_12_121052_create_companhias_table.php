<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanhiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companhias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj');
            $table->date('fundacao');
            $table->string('foneum');
            $table->string('fonedois')->nullable();
            $table->string('presidente');
            $table->string('fonepresidente');
            $table->string('vicepresidente');
            $table->string('fonevicepresidente');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('zona');
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
        Schema::dropIfExists('companhias');
    }
}
