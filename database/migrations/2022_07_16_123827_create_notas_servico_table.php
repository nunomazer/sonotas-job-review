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
