<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDadosOrigemServicoNFSeIntegracao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servico_integracao', function (Blueprint $table) {
            $table->jsonb('driver_dados')->nullable()->comment('Dados completos recebidos da fonte originária de integração');
        });

        Schema::table('notas_servico', function (Blueprint $table) {
            $table->jsonb('driver_dados')->nullable()->comment('Dados completos recebidos da fonte originária de integração');
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
