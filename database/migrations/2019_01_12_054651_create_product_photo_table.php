<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_photo', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('photo_id');
            $table->primary(['product_id', 'photo_id']);
            $table->foreign("product_id")->references('id')->on('products')->onDelete('cascade');
            $table->foreign("photo_id")->references('id')->on('photos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_photo');
    }
}
