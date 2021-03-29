<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('nascimento');
            $table->string('rg');
            $table->string('rgorgaoemissor');
            $table->string('cpf');
            $table->string('sexo');
            $table->string('racacor');
            $table->date('filiacao');
            $table->integer('quantidade');
            $table->string('endereco');
            $table->string('numero')->nullable();
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('zona');
            $table->string('foneum');
            $table->string('fonedois')->nullable();
            $table->longText('imagem')->nullable();

            $table->foreignId('companhia_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('associados');
    }
}
