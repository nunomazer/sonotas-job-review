<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddXmlPdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_servico', function (Blueprint $table) {
            $table->string('arquivo_xml', 255)->nullable();
            $table->boolean('arquivo_xml_downloaded', 255)->default(false);
            $table->string('arquivo_pdf', 255)->nullable();
            $table->boolean('arquivo_pdf_downloaded', 255)->default(false);
            $table->string('disk')->nullable()->comment('Em qual filesystem disk da aplicação estão armazenados os arquivos');
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
