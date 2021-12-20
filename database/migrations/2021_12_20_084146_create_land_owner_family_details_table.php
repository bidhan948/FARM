<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandOwnerFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_owner_family_details', function (Blueprint $table) {
            $table->id();
            $table->integer('land_owner_id');
            $table->integer('gender_id');
            $table->integer('below_18')->default(0);
            $table->integer('18_to_59')->default(0);
            $table->integer('above_60')->default(0);
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('land_owner_family_details');
    }
}
