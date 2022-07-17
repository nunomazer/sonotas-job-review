<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->string('tipo_servico_codigo');
            $table->foreign('tipo_servico_codigo')->references('codigo')->on('tipo_servicos');

            $table->boolean('ativo')->default(true);

            $table->string('nome');
            $table->decimal('valor', 20,2);
            $table->string('descricao',4000)->nullable();
            $table->string('obs',4000)->nullable();

            $table->decimal('cofins', 5,2);
            $table->decimal('csll', 5,2);
            $table->decimal('inss', 5,2);
            $table->decimal('ir', 5,2);
            $table->decimal('pis', 5,2);
            $table->decimal('iss', 5,2);

            $table->boolean('iss_retifo_fonte');

            $table->string('municipio_servico_codigo')->nullable();
            $table->string('municipio_servico_descricao')->nullable();

            $table->boolean('enviar_nota_email_cliente');

            $table->string('ultimo_rps_liberado')->nullable();

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
