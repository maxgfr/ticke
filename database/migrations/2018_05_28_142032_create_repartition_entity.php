<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartitionEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartition_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->integer('pattern_entity_id')->unsigned()->index();
            $table->foreign('pattern_entity_id')->references('id')->on('pattern_entity')->onDelete('cascade');
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
        Schema::dropIfExists('repartition_entity');
    }
}
