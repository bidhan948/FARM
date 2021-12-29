<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSamuhaStatusToLandOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('land_owners', function (Blueprint $table) {
            $table->boolean('samuha_status')->default(true);
            $table->boolean('coopertaive_status')->default(true);
            $table->boolean('farm_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('land_owners', function (Blueprint $table) {
            //
        });
    }
}
