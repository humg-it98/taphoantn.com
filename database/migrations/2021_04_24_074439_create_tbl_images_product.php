<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImagesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_images_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_image_1');
            $table->string('product_image_2');
            $table->string('product_image_3');
            $table->string('product_image_4');
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
        Schema::dropIfExists('tbl_images_product');
    }
}
