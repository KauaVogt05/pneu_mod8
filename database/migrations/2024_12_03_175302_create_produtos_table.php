<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('idProduto');
            $table->string('nome');
            $table->decimal('preco', 10, 2);
            $table->string('img')->nullable();
            $table->text('descricao')->nullable();
            $table->string('marca');
            $table->string('aro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}