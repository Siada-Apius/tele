<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 128);
			$table->text('description');
			$table->integer('amount_limit');
			$table->integer('daily_limit');
			$table->integer('max_amount_limit');
			$table->integer('support_visa');
			$table->integer('support_visa_electron');
			$table->integer('support_mastercard');
			$table->integer('support_amex');
			$table->integer('support_diners');
			$table->string('currency', 32);
			$table->integer('mountly_fee');
			$table->integer('successful_fixed');
			$table->double('successful_fixed_price');
			$table->integer('successful_relative');
			$table->double('successful_relative_price');
			$table->integer('declined_fixed');
			$table->double('declined_fixed_price');
			$table->integer('declined_relative');
			$table->double('declined_relative_price');
			$table->integer('refund_fixed');
			$table->double('refund_fixed_price');
			$table->integer('refund_relative');
			$table->double('refund_relative_price');
			$table->integer('chargeback_fixed');
			$table->double('chargeback_fixed_price');
			$table->integer('chargeback_relative');
			$table->double('chargeback_relative_price');
			$table->string('access_key', 128);
			$table->string('access_password', 128);
			$table->string('access_api', 128);
			$table->integer('manual');
			$table->text('contact_details');
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
		Schema::drop('merchants');
	}

}
