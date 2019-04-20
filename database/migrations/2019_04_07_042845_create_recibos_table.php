<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_cuota_cliente')->unsigned();

            $table->decimal('importe', 8, 2);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_cuota_cliente')->references('id')->on('cuotas_clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibos');
    }
}
