<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNerdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nerds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('email',255);
            $table->integer('nerd_level');
            $table->timestamp('created_at');
            $table->timestamp('updated_at'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nerds');
    }
}
