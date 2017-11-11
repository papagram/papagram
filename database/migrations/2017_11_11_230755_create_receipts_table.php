<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->comment('金額');
            $table->string('item')->comment('科目');
            $table->text('note')->nullable()->comment('メモ');
            $table->text('payee')->comment('支払先');
            $table->text('summary')->comment('摘要');
            $table->integer('card_id')->unsigned();
            $table->timestamps();

            $table->foreign('card_id')
                ->references('id')->on('cards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
