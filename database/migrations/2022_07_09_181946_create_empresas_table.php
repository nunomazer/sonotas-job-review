<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('owner_user_id')->unsigned();
            $table->foreign('owner_user_id')->references('id')->on('users');

            $table->string('documento')->unique()->comment('Cpf ou Cnpj');

            $table->string('nome')->comment('Razaõ social ou nome da pessoa física');
            $table->string('alias')->nullable()->comment('Apelido ou nome fantasia');
            $table->string('inscricao_estadual')->nullable();
            $table->string('inscricao_municipal')->nullable();

            $table->string('tipo_logradouro');
            $table->string('logradouro');
            $table->string('complemento')->nullable();
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('telefone_num');
            $table->string('telefone_ddd');

            $table->string('email');

            $table->integer('regime_tributario')->default(1);
            $table->integer('regime_tributario_especial')->default(0);

            $table->unsignedBigInteger('certificado_id')->nullable();
            $table->foreign('certificado_id')->references('id')->on('certificados');

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
        Schema::dropIfExists('empresas');
    }
}
