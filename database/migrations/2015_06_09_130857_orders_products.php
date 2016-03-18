<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            #$table->integer('shipping_method_id')->unsigned()->index();
            #$table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
			$table->double('product_qty');
            $table->double('product_units');
            $table->double('price');
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
		Schema::drop('order_items');
	}

}
