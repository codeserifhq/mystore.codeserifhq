<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('sold_by')->unsigned();

            $table->foreign('sold_by')->references('id')->on('partners');

            $table->dateTime('sold_date');
            $table->decimal('sub_total', 12,2);
            $table->decimal('discount', 12,2);
            $table->decimal('total', 12,2);
            $table->decimal('cash', 12,2);
            $table->decimal('change', 12,2);

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
        Schema::dropIfExists('sales');
    }
}
