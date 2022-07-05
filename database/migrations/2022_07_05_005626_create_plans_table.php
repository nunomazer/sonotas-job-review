<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->text('description');
            $table->decimal('price_month', 10, 2);
            $table->decimal('price_three_months', 10, 2)->nullable();
            $table->decimal('price_six_months', 10, 2)->nullable();
            $table->decimal('price_year', 10, 2)->nullable();
            $table->decimal('price_signup', 10, 2)->nullable();
            $table->smallInteger('grace_period')->default(5);
            $table->string('grace_interval')->default('day');

            $table->timestamps();
        });

        Schema::create('plan_features', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('plan_id')->unsigned();
            $table->string('slug');
            $table->name('name');
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
        Schema::dropIfExists('plans');
    }
}
