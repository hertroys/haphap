<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('icon');
        });

        DB::table('tags')->insert([
            ['name' => 'snel', 'icon' => 'access_time'],
            ['name' => 'goedkoop', 'icon' => 'monetization_on'],
            ['name' => 'gezond', 'icon' => 'favorite']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }

}
