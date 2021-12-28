<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterpreneurshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterpreneurships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->string('organization_name_nepali');
            $table->string('organization_name_english');
            $table->integer('organization_type_id');
            $table->string('organization_budget',50);
            $table->string('pan_no',150);
            $table->integer('province_id');
            $table->integer('district_id');
            $table->integer('municipality_id');
            $table->integer('ward');
            $table->string('toll_name');
            $table->string('contact_person_name')->nullable();
            $table->string('cit_no')->nullable();
            $table->string('contact_no')->nullable();
            $table->integer('no_of_staff_in_field')->nullable();
            $table->integer('ot_no_of_staff')->nullable();
            $table->integer('amsik_no_of_staff')->nullable();
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
        Schema::dropIfExists('enterpreneurships');
    }
}
