<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_cuota')->unsigned();
            $table->bigInteger('id_recibo')->unsigned();

            $table->decimal('importe', 8, 2);
            $table->decimal('saldo', 8, 2);

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_cuota')->references('id')->on('cuotas');
            //$table->foreign('id_recibo')->references('id')->on('recibos');

            $table->unique(['id_cliente', 'id_cuota']);

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
        Schema::dropIfExists('cuotas_clientes');
    }
}
