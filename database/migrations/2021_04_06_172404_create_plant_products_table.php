<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->double('selling_price');
            $table->double('discount_price')->nullable();
            $table->unsignedInteger('stock')->default(1);
            $table->string('sku');
            $table->boolean('is_available')->default(false);
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
        Schema::dropIfExists('plant_products');
    }
}
