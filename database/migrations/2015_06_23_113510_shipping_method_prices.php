<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShippingMethodPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_method_prices', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('currency');
            $table->double('price');
            $table->integer('shipping_method_id')->unsigned()->index();
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('shipping_method_prices');
    }

}
