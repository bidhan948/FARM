<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureAnimalCooperativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_animal_cooperatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->string('cooprative_name');
            $table->string('coopertaive_pan_no');
            $table->string('cooperative_reg_no');
            $table->string('cooperative_issue_date');
            $table->integer('cooperative_province_id');
            $table->integer('cooperative_district_id');
            $table->integer('cooperative_municipality_id');
            $table->integer('cooperative_ward');
            $table->integer('cooperative_toll_name');
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
        Schema::dropIfExists('agriculture_animal_cooperatives');
    }
}
