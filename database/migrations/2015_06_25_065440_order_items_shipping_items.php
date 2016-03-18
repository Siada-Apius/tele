<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderItemsShippingItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items_shipping_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_item_id')->unsigned()->index();
            $table->foreign('order_item_id')->references('id')->on('order_items')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('shipping_items_id')->unsigned()->index();
            $table->foreign('shipping_items_id')->references('id')->on('shipping_items')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('order_items_shipping_items');
    }
}
