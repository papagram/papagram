<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEstimatesTable.
 */
class CreateEstimatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estimates', function(Blueprint $table) {
            $table->increments('id');
            $table->date('issue_date')->nullable()->comment('発行日');
            $table->string('client_name')->comment('見積先名称');
            $table->string('subject')->comment('件名');
            $table->date('expiration_date')->nullable()->comment('有効期限');
            $table->text('note')->nullable()->comment('備考');
            $table->unsignedInteger('subtotal')->nullable()->comment('小計');
            $table->float('consumption_tax_rate')->nullable()->comment('消費税率');
            $table->unsignedInteger('amount_total')->nullable()->comment('合計金額　小数点以下は四捨五入');
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
		Schema::drop('estimates');
	}
}
