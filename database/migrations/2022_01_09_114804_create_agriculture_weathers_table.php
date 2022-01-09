<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_weathers', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedInteger('index');
            $table->string('dateFromBs');
            $table->string('dateToBs');
            $table->text('long_desc');
            $table->string('date_desc')->nullable();
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
        Schema::dropIfExists('agriculture_weathers');
    }
}
