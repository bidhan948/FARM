<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_farms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->string('farm_name');
            $table->string('farm_pan_no');
            $table->string('farm_reg_no');
            $table->string('farm_issue_date');
            $table->integer('farm_province_id');
            $table->integer('farm_district_id');
            $table->integer('farm_municipality_id');
            $table->integer('farm_ward');
            $table->integer('farm_toll_name');
            $table->softDeletes();
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
        Schema::dropIfExists('agriculture_farms');
    }
}
