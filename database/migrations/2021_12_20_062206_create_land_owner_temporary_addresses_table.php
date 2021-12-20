<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandOwnerTemporaryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_owner_temporary_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('land_owner_id');
            $table->string('province_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('municipality_id')->nullable();
            $table->string('ward')->nullable();
            $table->string('tole')->nullable();
            $table->boolean('is_foreign')->default(FALSE);
            $table->string('country_name')->nullable();
            $table->string('passport_no')->nullable();
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
        Schema::dropIfExists('land_owner_temporary_addresses');
    }
}
