<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->integer('repartition_id')->unsigned()->index();
            $table->foreign('repartition_id')->references('id')->on('repartition')->onDelete('cascade');
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
        Schema::dropIfExists('ticket');
    }
}
