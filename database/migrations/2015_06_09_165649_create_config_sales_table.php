<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config_sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("leads_per_day");
			$table->integer("do_not_call_iterations");
			$table->integer("days_between_do_not_call");
			$table->integer("bad_number_iterations");
			$table->integer("days_between_bad_number_iterations");
			$table->string("search_columns");
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
		Schema::drop('config_sales');
	}

}
