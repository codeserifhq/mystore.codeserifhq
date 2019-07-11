<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\PartnerTypeEnum;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('manager_id')->unsigned()->nullable();
            $table->integer('job_position')->unsigned()->nullable();

            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('company_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_image_type')->nullable();
            $table->date('birthdate')->nullable();
            $table->boolean('is_supplier')->default(false);

            $table->smallInteger('type')->default(PartnerTypeEnum::INDIVIDUAL);
            
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
        Schema::dropIfExists('partners');
    }
}
