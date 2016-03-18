<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('hashcode', 60);
			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('assignee_id')->unsigned()->index();
			$table->foreign('assignee_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->string('source');
			$table->text('comment');
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
		Schema::drop('tickets');
	}

}
