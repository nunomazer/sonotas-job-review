<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaPlanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_assinatura', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->string('driver')->nullable()->comment('Nome do driver de integracao para a plataforma de cobrança');
            $table->string('driver_id')->nullable()->comment('Id da assinatura ou cobrança recorrente criada no driver');
            $table->integer('status')->nullable()->comment('Status da assinatura gerenciado pelos drivers correspondente ao service');

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
        Schema::dropIfExists('empresa_integras');
    }
}
