<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CampoCertificado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('certificado_id');
        });
        
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('certificado_id');
        });
        
        Schema::table('empresa_nfs_configuracoes', function (Blueprint $table) { 
            $table->unsignedBigInteger('certificado_id')->nullable();
            $table->foreign('certificado_id')->references('id')->on('certificados');
        });
        
        Schema::table('certificados', function (Blueprint $table) { 
            $table->date('expires_at');
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
    }
}
