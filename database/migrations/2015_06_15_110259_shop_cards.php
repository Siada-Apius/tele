<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

		public function up()
		{
			Schema::create('shop_supported_payments', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('shop_id')->unsigned()->index();
				$table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');
                $table->integer('card_id')->unsigned()->index();
                $table->foreign('card_id')->references('id')->on('cards')->onUpdate('cascade')->onDelete('cascade');
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
			Schema::drop('shop_supported_payments');
		}
}
