<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('name');
			$table->string('phone', 20)->nullable()->after('email');
	        $table->string('last_name', 100)->nullable()->after('id');
	        $table->string('first_name', 100)->after('last_name');
	        $table->string('nickname', 100)->nullable()->after('first_name');
	        $table->string('vk_user_id', 20)->nullable()->after('phone');
	        $table->string('city', 100)->nullable()->after('phone');
	        $table->string('country', 100)->nullable()->after('phone');
	        $table->string('comment', 1000)->nullable()->after('city');
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
        Schema::table('users', function (Blueprint $table) {
	        $table->string('name', 100);
	        $table->dropColumn('last_name', 'first_name', 'nickname', 'phone', 'country', 'city', 'vk_user_id','comment');
        });
    }
}
