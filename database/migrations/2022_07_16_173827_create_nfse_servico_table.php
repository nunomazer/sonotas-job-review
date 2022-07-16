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
        Schema::create('nfse_servico', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('nota_servico_id')->comment('Cabeçalho da Nota');
            $table->foreign('nota_servico_id')->references('id')->on('notas_servico');

            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos');

            $table->decimal('valor', 20,2);

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
