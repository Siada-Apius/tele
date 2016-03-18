<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sales_agent_id')->unsigned()->index();
			$table->foreign('sales_agent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('customer_id')->unsigned()->index();
			$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
			$table->integer("do_not_call_iterations");
			$table->integer("bad_number_iterations");
			$table->string('group');
			$table->string('priority');
			$table->string('status');
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
		Schema::drop('leads');
	}

}
