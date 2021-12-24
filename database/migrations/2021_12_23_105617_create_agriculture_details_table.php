<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->integer('crop_type_id');
            $table->integer('crop_id');
            $table->float('area1')->nullable();
            $table->float('area2')->nullable();
            $table->float('area3')->nullable();
            $table->float('area4')->nullable();
            $table->integer('seed_source_id');
            $table->integer('seed_supplier_id');
            $table->float('total_area')->nullable();
            $table->float('total_production')->nullable();
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
        Schema::dropIfExists('agriculture_details');
    }
}
