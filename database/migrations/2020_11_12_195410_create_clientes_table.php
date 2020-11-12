<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 100);
            $table->string('telefone', 20);
            $table->dateTime('data_nascimento', 0);
            $table->string('cep', 15);
            $table->string('endereco', 200);
            $table->string('bairro', 80);
            $table->string('ponto_referencia', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clientes');
    }
}
