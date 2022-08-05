<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNfseServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_item', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->references('id')->on('vendas');

            $table->unsignedBigInteger('item_id');

            $table->string('tipo_documento')->comment('Se NFSe = serviço é relacionado, NFe = produto é relacionado');

            $table->decimal('qtde', 20,2)->default(1);
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
