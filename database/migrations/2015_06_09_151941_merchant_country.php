<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerchantCountry extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchant_country', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('country_id')->unsigned()->index();
			$table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('merchant_id')->unsigned()->index();
			$table->foreign('merchant_id')->references('id')->on('merchants')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('merchant_country');
	}

}
