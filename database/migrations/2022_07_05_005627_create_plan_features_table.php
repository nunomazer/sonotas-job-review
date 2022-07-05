<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_features', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('plan_id')->unsigned();
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('value');
            $table->smallInteger('period')->unsigned()->default(1);
            $table->string('interval')->default('month');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['plan_id', 'slug']);
            $table->foreign('plan_id')->references('id')->on('plans')
                ->onDelete('cascade')->onUpdate('cascade');
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
