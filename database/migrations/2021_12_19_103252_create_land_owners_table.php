<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name_nepali');
            $table->string('name_english');
            $table->integer('gender_id');
            $table->integer('ethnic_group_id');
            $table->integer('citizenship_type_id');
            $table->string('issue_dateBs');
            $table->string('issue_dateAd');
            $table->string('cit_no');
            $table->string('issue_office');
            $table->string('birth_dateBs');
            $table->string('birth_dateAd');
            $table->string('mother_tongue');
            $table->string('contact_no');
            $table->integer('marital_status_id');
            $table->string('couple_name')->nullable();
            $table->string('couple_cit_no')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_cit_no')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_cit_no')->nullable();
            $table->integer('bussiness_id')->nullable();
            $table->integer('education_qualification_id')->nullable();
            $table->boolean('is_foreign')->default(FALSE);
            $table->string('country_name')->nullable();
            $table->string('foreign_member')->nullable();
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
        Schema::dropIfExists('land_owners');
    }
}
