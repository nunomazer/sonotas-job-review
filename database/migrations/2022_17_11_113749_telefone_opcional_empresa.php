<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TelefoneOpcionalEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('telefone_num', 255)->nullable(true)->change(); 
            $table->string('telefone_ddd', 255)->nullable(true)->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) { 
            $table->string('telefone_num', 255)->nullable(false)->change();
            $table->string('telefone_ddd', 255)->nullable(false)->change();
        });
    }
}
