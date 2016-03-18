<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductQtyPriceToShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_qty_price_to_shop', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('shop_id')->unsigned()->index();
            $table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('product_group_to_qty_type_id')->unsigned()->index();
            $table->foreign('product_group_to_qty_type_id')->references('id')->on('product_group_to_qty_type')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('product_qty_price_to_shop');
    }
}
