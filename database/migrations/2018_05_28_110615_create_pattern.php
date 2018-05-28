<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePattern extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_number');
            $table->string('nom');
            $table->integer('entity_id')->unsigned()->nullable()->index();
            $table->foreign('entity_id')->references('id')->on('entity');
            $table->integer('users_id')->unsigned()->nullable()->index();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('pattern');
    }
}
