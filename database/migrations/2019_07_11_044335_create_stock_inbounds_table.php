<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_inbounds', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('supplier_id')->unsigned();
            $table->integer('stock_in_by')->unsigned();
            $table->integer('stock_outbound_branch')->unsigned(); //if from branch
            $table->integer('stock_outbound_id')->unsigned(); //if from branch

            $table->foreign('supplier_id')->references('id')->on('partners');
            $table->foreign('stock_in_by')->references('id')->on('partners');

            $table->string('receipt_no');
            $table->date('receipt_date');
            $table->dateTime('inbound_date');
            $table->date('expiration_date');
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('stock_inbounds');
    }
}
