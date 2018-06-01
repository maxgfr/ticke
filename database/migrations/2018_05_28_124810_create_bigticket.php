<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBigticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bigvalue');
            $table->integer('batch_id')->unsigned()->index();
            $table->foreign('batch_id')->references('id')->on('batch')->onDelete('cascade');
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
        Schema::dropIfExists('bigticket');
    }
}
