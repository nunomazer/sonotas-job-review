<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaIntegrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_integracoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('name');
            $table->string('driver')->comment('Nome do driver de integracao para a plataforma');
            $table->jsonb('fields')->comment('Campos configurador e usados pela integração, de acordo com os fields criados nas classes concretas');
            $table->boolean('ativo')->default(true);
            $table->string('tipo_documento');
            $table->date('data_inicio');
            $table->boolean('transmissao_automatica')->default(false);
            $table->string('transmissao_periodo');
            $table->boolean('transmissao_apenas_dias_uteis')->default(false);

            $table->unique(['empresa_id', 'driver']);

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
