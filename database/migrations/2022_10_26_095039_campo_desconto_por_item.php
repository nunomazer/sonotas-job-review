<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CampoDescontoPorItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('vendas', function (Blueprint $table) {
            $table->dropColumn('desconto');
        });

        Schema::table('notas_servico', function (Blueprint $table) { 
            $table->dropColumn('desconto');
        });
        
        Schema::table('venda_item', function (Blueprint $table) {
            $table->decimal('desconto', 17, 2)->default(0);
        });
        
        Schema::table('nfse_servico', function (Blueprint $table) {
            $table->decimal('desconto', 17, 2)->default(0);
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
