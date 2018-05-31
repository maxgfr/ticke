<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->string('nom')->nullable();
            $table->integer('emplacement');
            $table->integer('pattern_id')->unsigned()->index();
            $table->foreign('pattern_id')->references('id')->on('pattern')->onDelete('cascade');
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
        Schema::dropIfExists('repartition');
    }
}
