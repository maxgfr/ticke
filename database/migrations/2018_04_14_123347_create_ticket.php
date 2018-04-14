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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->double('numero_titre');
            $table->integer('cle_cryptage');
            $table->double('valeur');
            $table->integer('emetteur');
            $table->integer('cle_controle');
            $table->integer('code_famille');
            $table->integer('produit');
            $table->integer('millesime');
            $table->string('ligne');
            $table->integer('batchticket_id')->unsigned()->index();
            $table->foreign('batchticket_id')->references('id')->on('batchtickets')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
