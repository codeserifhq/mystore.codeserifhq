<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInboundProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_inbound_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('stock_inbound_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('stock_inbound_id')->references('id')->on('stock_inbounds');

            $table->double('quantity', 15, 5);
            $table->decimal('cost', 12,2);
            $table->date('expiration_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_inbound_products');
    }
}
