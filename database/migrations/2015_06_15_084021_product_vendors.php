<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_vendors_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ppu');
            $table->integer('limits');
            $table->integer('status');
            $table->string('vendor_product_name', 128);
	        $table->integer('product_id')->unsigned()->index();
	        $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
	        $table->integer('shipping_methods_id')->unsigned()->index();
	        $table->foreign('shipping_methods_id')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('product_vendors_methods');
    }
}
