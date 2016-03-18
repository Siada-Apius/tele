<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorsCountries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendors_countries', function(Blueprint $table)
		{
            $table->increments('id');
			$table->integer('contries_id')->unsigned()->index();
			$table->foreign('contries_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('vendors_id')->unsigned()->index();
			$table->foreign('vendors_id')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('vendors_countries');
	}

}
