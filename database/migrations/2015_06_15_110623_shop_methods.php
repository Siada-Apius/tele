<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

	    Schema::create('shipping_methods_shop', function(Blueprint $table)
	    {
            $table->increments('id');
		    $table->integer('shop_id')->unsigned()->index();
		    $table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');
		    $table->integer('shipping_method')->unsigned()->index();
		    $table->foreign('shipping_method')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('shipping_methods_shop');
	}
}
