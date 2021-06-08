<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantProductPlanterStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_product_planter_styles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plant_product_id');
            $table->foreign('plant_product_id')
            ->references('id')
            ->on('plant_products');

            $table->unsignedBigInteger('planter_style_id');
            $table->foreign('planter_style_id')
            ->references('id')
            ->on('planter_styles');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_product_planter_styles');
    }
}
