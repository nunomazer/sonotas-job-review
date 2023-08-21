<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmbienteProducao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresa_nfs_configuracoes', function (Blueprint $table) {
            $table->boolean('producao')->default(false)->comment('QUando true as NFSE emitidas serão em ambiente de produção');
        });

        Schema::table('notas_servico', function (Blueprint $table) {
            $table->boolean('producao')->default(false)->comment('Indica se a NFSE for emitida em ambiente de produção ou não');
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
