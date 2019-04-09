<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('name')->nullable();
            $table->string('street', 100)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('suburb', 50)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country')->default('Bangladesh');
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
        Schema::dropIfExists('locations');
    }
}
