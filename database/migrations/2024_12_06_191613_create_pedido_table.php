<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id('idPedido');
        $table->date('data_pedido');
        $table->decimal('total_valor', 10, 2);
        $table->string('status');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
