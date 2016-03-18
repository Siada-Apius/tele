<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopCountries extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries_shop', function (Blueprint $table) {

            $table->increments('id');
			$table->integer('shop_id')->unsigned()->index();
			$table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('countries_id')->unsigned()->index();
			$table->foreign('countries_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('countries_shop');
	}

}
