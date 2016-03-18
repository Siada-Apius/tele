<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shops', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('host_name');
			$table->string('main_url');
			$table->string('company_name');
			$table->string('api_token');
			$table->string('api_pass');
			$table->integer('status');
			$table->integer('ssl');
            $table->integer('comments');
            $table->string('phone_supports');
            $table->string('phone_sales');
			$table->string('support_email');
			$table->string('support_email_password');
			$table->string('support_email_server');
			$table->string('sales_email');
			$table->string('sales_email_password');
			$table->string('sales_email_server');
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
		Schema::drop('shops');
	}

}
