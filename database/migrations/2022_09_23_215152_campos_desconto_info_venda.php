<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamposDescontoInfoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendas', function (Blueprint $table) {
            $table->decimal('desconto', 17,2)->default(0);
            $table->string('info_adicional', 4000)->nullable();
        });

        Schema::table('notas_servico', function (Blueprint $table) {
            $table->decimal('desconto', 17,2)->default(0);
            $table->string('info_adicional', 4000)->nullable();
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
