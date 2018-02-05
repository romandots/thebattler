<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('brief', 500)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('picture', 1000)->nullable();
            $table->string('status', 10)->nullable();

	        $table->integer('organizer_id')->index();
	        $table->foreign('organizer_id')->references('id')->on('users');

            $table->timestamp('starts_at' )->nullable();
            $table->timestamp('ends_at' )->nullable();

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
        Schema::dropIfExists('events');
    }
}
