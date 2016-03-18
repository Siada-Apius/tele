<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipping_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('shipping_method')->unsigned()->index();
			$table->foreign('shipping_method')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('shipping_id')->unsigned()->index();
			$table->foreign('shipping_id')->references('id')->on('shippings')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shipping_items');
	}

}
