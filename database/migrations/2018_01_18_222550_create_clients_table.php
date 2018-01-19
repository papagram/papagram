<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClientsTable.
 */
class CreateClientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->unique()->comment('管理コード');
            $table->string('name');
            $table->string('tel1', 3)->nullable();
            $table->string('tel2', 4)->nullable();
            $table->string('tel3', 4)->nullable();
            $table->string('postcode1', 3)->nullable();
            $table->string('postcode2', 4)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('url')->nullable();
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
		Schema::drop('clients');
	}
}
