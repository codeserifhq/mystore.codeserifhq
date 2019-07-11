<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contracts', function (Blueprint $table) {
            $table->integer('id');

            $table->integer('company_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('total_users');
            
            $table->mediumText('remarks')->nullable();

            $table->smallInteger('type'); //type
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
        Schema::dropIfExists('company_contracts');
    }
}
