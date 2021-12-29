<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureSamuhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_samuhas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->string('samuha_name');
            $table->string('samuha_pan_no',150);
            $table->string("samuha_reg_no",150);
            $table->string('samuha_issue_date');
            $table->integer('samuha_province_id');
            $table->integer('samuha_district_id');
            $table->integer('samuha_municipality_id');
            $table->integer('samuha_ward');
            $table->integer('samuha_toll_name');
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
        Schema::dropIfExists('agriculture_samuhas');
    }
}
