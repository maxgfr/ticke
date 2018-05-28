<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->integer('repartition_entity_id')->unsigned()->index();
            $table->foreign('repartition_entity_id')->references('id')->on('repartition_entity')->onDelete('cascade');
            $table->integer('batch_pattern_id')->unsigned()->index();
            $table->foreign('batch_pattern_id')->references('id')->on('batch_pattern')->onDelete('cascade');
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
        Schema::dropIfExists('ticket_entity');
    }
}
