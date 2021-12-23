<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_owner_id')->constrained();
            $table->integer('land_type_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('kitta_no',100)->nullable();
            $table->integer('area1')->nullable();
            $table->integer('area2')->nullable();
            $table->integer('area3')->nullable();
            $table->integer('area4')->nullable();
            $table->integer('bargha_area')->nullable();
            $table->integer('cultivable_area')->nullable();
            $table->integer('cultivated_area')->nullable();
            $table->integer('total_area')->nullable();
            $table->boolean('irrigation_facility')->default(false);
            $table->integer('irrigation_area')->nullable();
            $table->integer('unirrigation_area')->nullable();
            $table->integer('irrigation_type_id')->nullable();
            $table->boolean('road_facility')->default(false);
            $table->boolean('is_bajho')->default(false);
            $table->boolean('is_charan_kharka')->default(false);
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('land_details');
    }
}
