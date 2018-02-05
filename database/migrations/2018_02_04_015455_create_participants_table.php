<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');

	        $table->integer('user_id')->index();
	        $table->foreign('user_id')->references('id')->on('users');

	        $table->integer('category_id')->index();
	        $table->foreign('category_id')->references('id')->on('categories');

	        $table->string('name', 100);
	        $table->string('team', 100)->nullable();
	        $table->string('comment', 1000)->nullable();

	        $table->string('status', 10)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
