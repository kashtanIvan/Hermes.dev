<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('parent_id', false, true)->index()->nullable();
            $table->string('name', 255)->default('Unknown');
            $table->string('slug', 255)->nullable();
            $table->boolean('hidden')->default(true);
            $table->text('description')->nullable();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('brand_id', false, true)->index()->default(1);
            $table->integer('model_id', false, true)->index()->default(1);
            $table->integer('cat_id', false, true)->index()->default(1);
            $table->boolean('hidden')->default(true);
            $table->text('description')->nullable();
            $table->string('slug', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('prod_id', false, true)->index()->default(1);
            $table->integer('qty', false, true)->default(1);
            $table->decimal('price', 8, 2)->default(0);
            $table->boolean('hidden')->default(false);
            $table->string('slug', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('key', 255)->nullable();
            $table->string('value', 255)->nullable();
        });

        Schema::create('prod_attr', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('prod_id', false, true)->index()->nullable();
            $table->integer('attr_id', false, true)->index()->nullable();
        });

        Schema::create('item_attr', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('item_id', false, true)->index()->nullable();
            $table->integer('attr_id', false, true)->index()->nullable();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('brand_models', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name', 255)->nullable();
            $table->integer('brand_id', false, true)->index()->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('items');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('prod_attr');
        Schema::dropIfExists('item_attr');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brand_models');
    }
}
