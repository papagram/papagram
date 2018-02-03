<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateItemsTable.
 */
class CreateItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('項目名');
            $table->integer('number')->comment('数量');
            $table->integer('unit_price')->comment('単価');
            $table->integer('subtotal')->comment('小計');
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
		Schema::drop('items');
	}
}
