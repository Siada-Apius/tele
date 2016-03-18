<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopsCategoriesProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('shop_categories_products', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('shops_id')->unsigned()->index();
			$table->foreign('shops_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('products_id')->unsigned()->index();
			$table->foreign('products_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('priority');
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
		Schema::drop('shop_categories_products');
	}

}
