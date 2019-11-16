<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('cuotas', function (Blueprint $table) {
            $table->decimal('importe4', 8, 2)->default(1);
            $table->decimal('importe5', 8, 2)->default(1);
            $table->decimal('importe6', 8, 2)->default(1);
         });
        
        DB::statement("ALTER TABLE clientes MODIFY COLUMN tipo_cuota ENUM('TIPO1', 'TIPO2', 'TIPO3', 'TIPO4', 'TIPO5', 'TIPO6') NOT NULL DEFAULT 'TIPO1'");   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropColumn('importe4');
            $table->dropColumn('importe5');
            $table->dropColumn('importe6');
        });
      DB::statement("ALTER TABLE clientes MODIFY COLUMN tipo_cuota ENUM('TIPO1', 'TIPO2', 'TIPO3') NOT NULL DEFAULT 'TIPO1'");   
    }
}
