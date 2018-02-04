<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattlesParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battles_participants', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('battle_id')->unsigned();
	        $table->integer('participant_id')->unsigned();

	        $table->foreign('battle_id')->references('id')->on('battles')->onDelete('cascade');
	        $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');

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
	    Schema::dropIfExists('battles_participants');
    }
}
