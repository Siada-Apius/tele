<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('transaction_id')->unique();;
			$table->integer('merchant_id')->unsigned()->index();
			$table->foreign('merchant_id')->references('id')->on('merchants')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('agent_id')->unsigned()->index();
			$table->foreign('agent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('type');
			$table->string('system_amount');
			$table->string('system_currency');
			$table->string('payment_card');
			$table->string('payment_card_cvv');
			$table->string('payment_card_date');
			$table->string('status');
			$table->string('fail_reason');
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
		Schema::drop('transactions');
	}

}
