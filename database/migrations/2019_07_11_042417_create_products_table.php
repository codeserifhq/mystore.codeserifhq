<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('category_id')->unsigned();
            $table->integer('company_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('code')->unique();
            $table->string('name');
            $table->string('unit');
            $table->decimal('unit_price', 12, 2)->default(0.00);
            $table->double('max_stock',14,4)->default(100);
            $table->integer('stock_to_alert');
            $table->mediumText('remarks')->nullable();
            $table->boolean('alert')->default(false);
            $table->date('expiration_date')->nullable();

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
        Schema::dropIfExists('products');
    }
}
