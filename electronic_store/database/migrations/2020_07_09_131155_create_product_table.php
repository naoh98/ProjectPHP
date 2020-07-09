<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_title');
            $table->string('product_desc');
            $table->string('product_main_image');
            $table->string('product_images');
            $table->string('product_manufacturer');
            $table->string('product_quantity');
            $table->string('product_type');
            $table->double('product_price_core');
            $table->integer('product_tax');
            $table->double('product_price_sell');
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
        Schema::dropIfExists('product');
    }
}
