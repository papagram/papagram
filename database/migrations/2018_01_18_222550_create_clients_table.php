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
            $table->string('code', 10)->nullable()->comment('管理コード');
            $table->string('name');
            $table->string('tel1', 3);
            $table->string('tel2', 4);
            $table->string('tel3', 4);
            $table->string('postcode1', 3);
            $table->string('postcode2', 4);
            $table->string('address');
            $table->string('email')->unique();
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
