<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();

            $table->string('name')->index();
            $table->string('slug')->index();
            $table->unsignedInteger('logo_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->string('website')->nullable();
            $table->string('video_link')->nullable();

            $table->longText('description')->nullable();
            $table->string('general_phone', 20)->nullable();
            $table->string('business_phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('businesses');
    }
}
