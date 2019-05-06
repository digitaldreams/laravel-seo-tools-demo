<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->string('slug')->index();
            $table->string('model', 30)->nullable();
            $table->string('sku', 100);
            $table->double('price')->nullable();
            $table->string('brand', 100)->nullable();

            $table->unsignedInteger('image_id')->nullable();
            $table->enum('status', ['pending', 'active', 'cancelled']);
            $table->double('review')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

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
        Schema::dropIfExists('products');
    }
}
