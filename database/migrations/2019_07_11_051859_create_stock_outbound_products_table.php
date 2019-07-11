<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOutboundProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_outbound_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('stock_outbound_id')->unsigned();

            $table->foreign('stock_outbound_id')->references('id')->on('stock_outbounds');
            $table->foreign('product_id')->references('id')->on('products');

            $table->double('quantity', 15, 5);    
            $table->decimal('cost', 12,2)->nullable(); //if sale
            
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
        Schema::dropIfExists('stock_outbound_products');
    }
}
