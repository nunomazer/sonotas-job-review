<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            $table->string('driver')->nullable()->comment('Origem da venda se veio por integração');
            $table->string('driver_id')->nullable()->comment('Identificação ou protocolo de retorno do driver');
            $table->jsonb('driver_dados')->nullable()->comment('Todos os dados de retorno da integração');

            $table->dateTime('data_transacao');

            $table->unsignedBigInteger('empresa_id')->comment('Emissor da NF');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedBigInteger('cliente_id')->comment('Cliente de nossas empresas clientes');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->decimal('valor', 20,2);

            $table->string('tipo_documento')->comment('Se NFSe, NFe ou outro que deverá ser emitido para a transação comercial');
            $table->dateTime('data_emissao_planejada')->nullable()->comment('Data que está planejada a emissão do doc fiscal');
            $table->unsignedBigInteger('documento_id')->nullable()->comment('Id do documento fiscal emitido, relacionar com a tabela de notas de acordo com o tipo');

            $table->index(['driver_id', 'empresa_id']);
            $table->index(['driver', 'driver_id', 'empresa_id']);

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
