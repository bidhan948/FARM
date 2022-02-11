<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerSeedManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizer_seed_managements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('land_owner_id');
            $table->enum('stock_type', ['seed', 'fertilizer']);
            $table->unsignedInteger('crop_id')->nullable();
            $table->unsignedInteger('fertilizer_id')->nullable();
            $table->unsignedInteger('unit_id');
            $table->unsignedBigInteger('quantity');
            $table->text('remark')->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('fertilizer_seed_managements');
    }
}
