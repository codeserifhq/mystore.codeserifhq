<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOutboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_outbounds', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('sale_id')->unsigned(); //if sale
            $table->integer('stock_out_by')->unsigned();
            $table->integer('branch_id')->unsigned(); //branch that produced this outbound

            $table->foreign('stock_out_by')->references('id')->on('partners');
            $table->foreign('branch_id')->references('id')->on('branches');
            
            $table->dateTime("stock_out_date");
            $table->string('reason');
            
        
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
        Schema::dropIfExists('stock_outbounds');
    }
}
