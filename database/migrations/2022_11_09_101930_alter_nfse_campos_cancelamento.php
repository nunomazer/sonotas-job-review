<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNfseCamposCancelamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_servico', function (Blueprint $table) {
            $table->integer('cancelamento_codigo')->nullable(true);
            $table->string('cancelamento_motivo', 255)->nullable(true);
            $table->string('cancelamento_protocolo', 255)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas_servico', function (Blueprint $table) { 
            $table->dropColumn('cancelamento_codigo');
            $table->dropColumn('cancelamento_motivo');
            $table->dropColumn('cancelamento_protocolo');
        });
    }
}
