<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_tags', function(Blueprint $table)
        {
            $table->unsignedInteger('dish_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dishes_tags');
    }
}
