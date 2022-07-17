<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_servico', function (Blueprint $table) {
            $table->id();

            $table->string('driver')->nullable();
            $table->string('driver_id')->nullable()->comment('Identificação ou protocolo de retorno do driver');
            $table->string('status')->index()->comment('Status do fluxo pendente/enviado/processamento/erro/gerado');
            $table->jsonb('status_dados')->nullable()->comment('Alguns status definem uma descrição, mensagem, dados extras, podem ser o erro ou retorno satisfatório com meta dados do retorno');

            $table->dateTime('emitido_em');

            $table->unsignedBigInteger('empresa_id')->comment('Emissor da NF');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedBigInteger('cliente_id')->comment('Tomador/comprador da NF - cliente de nossas empresas clientes');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->decimal('valor', 20,2);

            $table->index(['driver_id', 'empresa_id']);

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
