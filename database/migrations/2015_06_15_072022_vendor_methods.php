<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
	        $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('min_eta');
            $table->string('max_eta');
            $table->integer('isTNRequired');
            $table->integer('vendor_id')->unsigned()->index();
	        $table->foreign('vendor_id')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('shipping_methods');
	}
}
