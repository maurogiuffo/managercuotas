<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesObservacionesMailNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        Schema::table('clientes', function (Blueprint $table) {
           $table->string('mail')->default('')->nullable()->change();
           $table->string('observaciones')->default('')->nullable()->change();
        });*/


        DB::statement("ALTER TABLE clientes MODIFY mail varchar(191) null default '';");           
        DB::statement("ALTER TABLE clientes MODIFY observaciones varchar(191) null default '';");           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('clientes', function (Blueprint $table) {
           $table->string('mail')->default('')->change();
           $table->string('observaciones')->default('')->change();
        }); */           
    }
}
