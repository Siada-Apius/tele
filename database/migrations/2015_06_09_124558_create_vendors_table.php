<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('display_name');
			$table->string('contact_details');
			$table->string('hard_limit');
			$table->string('api');
			$table->string('api_for_shipping');
			$table->string('email');
			$table->string('email_for_shipping');
			$table->integer('status');
			$table->integer('ups');
			$table->softDeletes();
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
		Schema::drop('vendors');
	}

}
