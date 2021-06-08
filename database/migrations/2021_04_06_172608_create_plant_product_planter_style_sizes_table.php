<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantProductPlanterStyleSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_product_planter_style_sizes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plant_product_planter_style_id');
            $table->foreign('plant_product_planter_style_id', 'planter_style_id')
            ->references('id')
            ->on('plant_product_planter_styles');

            $table->unsignedBigInteger('planter_size_id');
            $table->foreign('planter_size_id')
            ->references('id')
            ->on('planter_sizes');
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
        Schema::dropIfExists('plant_product_planter_style_sizes');
    }
}
