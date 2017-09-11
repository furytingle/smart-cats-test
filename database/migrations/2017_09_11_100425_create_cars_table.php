<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carBrandId');
            $table->unsignedInteger('carModelId');
            $table->unsignedInteger('categoryId');
            $table->decimal('price');
            $table->string('currency')->default('USD')->nullable();
            $table->smallInteger('yearMade');
            $table->string('ownerName');
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('carBrandId')
                ->references('id')
                ->on('car_brands');

            $table->foreign('carModelId')
                ->references('id')
                ->on('car_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['carModelId']);
            $table->dropForeign(['carBrandId']);
        });

        Schema::dropIfExists('cars');
    }
}
