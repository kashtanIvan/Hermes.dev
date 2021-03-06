<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name', 255)->default('Unknown');
            $table->string('ext')->default('jpg');
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('size')->default(0);
            $table->boolean('hidden')->default(true);
            $table->string('location')->default('/');
            $table->timestamps();
        });

        Schema::create('mini_images', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('original_id')->default(0)->index();
            $table->integer('size')->default(0);
            $table->string('location')->default('/');
            $table->timestamps();
        });

        Schema::create('image_products', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('image_id')->default(0);
            $table->integer('prod_id')->default(0);
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('mini_images');
        Schema::dropIfExists('image_products');
    }
}
