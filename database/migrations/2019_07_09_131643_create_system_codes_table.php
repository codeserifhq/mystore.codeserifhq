<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('type')->unsigned();
            $table->integer('company_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('companies');
            
            $table->string('name');
            $table->mediumText('description')->nullable();
            
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
        Schema::dropIfExists('system_codes');
    }
}
