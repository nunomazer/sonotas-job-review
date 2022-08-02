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
            $table->increments('id');

            $table->string('name')->unique();
            $table->text('description');
            $table->decimal('price_month', 10, 2);
            $table->decimal('price_signup', 10, 2)->nullable();
            $table->smallInteger('grace_period')->default(5);
            $table->string('grace_interval')->default('day');
            $table->json('features')->nullable();
            $table->boolean('active')->default(true);

            $table->string('moneyflow_driver')->nullable();
            $table->string('moneyflow_cod')->nullable();

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
