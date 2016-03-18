<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_groups', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('group_id')->unsigned()->index();
	        $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
	        $table->integer('lead_id')->unsigned()->index();
	        $table->foreign('lead_id')->references('id')->on('leads')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('lead_groups');
    }
}
