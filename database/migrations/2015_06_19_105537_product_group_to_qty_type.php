<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductGroupToQtyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_group_to_qty_type', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('price_groups_id')->unsigned()->index();
            $table->foreign('price_groups_id')->references('id')->on('price_groups')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('qty_type_name_id')->unsigned()->index();
            $table->foreign('qty_type_name_id')->references('id')->on('product_qty_types')->onUpdate('cascade')->onDelete('cascade');

            $table->double('price');
            $table->integer('qty');

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
        Schema::drop('product_group_to_qty_type');
    }
}
