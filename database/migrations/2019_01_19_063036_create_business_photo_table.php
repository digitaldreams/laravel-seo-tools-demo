<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_photo', function (Blueprint $table) {
            $table->unsignedInteger('business_id');
            $table->unsignedInteger('photo_id');
            $table->primary(['business_id', 'photo_id']);
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_photo');
    }
}
