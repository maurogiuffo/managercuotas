<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuotasType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->decimal('importe2', 8, 2)->default(0);
            $table->decimal('importe3', 8, 2)->default(0);
         });
        
        Schema::table('clientes', function (Blueprint $table) {
            $table->enum('tipo_cuota', ['TIPO1','TIPO2','TIPO3'])->default('TIPO1');
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
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropColumn('importe2');
            $table->dropColumn('importe3');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('tipo_cuota');
        });

    }
}
