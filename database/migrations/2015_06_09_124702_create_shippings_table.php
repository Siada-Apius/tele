<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('shipping_manager')->unsigned()->index();
			$table->foreign('shipping_manager')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('type', 60);
			$table->string('status', 60);
			$table->string('tn_code', 60);
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
		Schema::drop('shippings');
	}

}
