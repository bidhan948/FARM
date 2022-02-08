<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nuallable();
            $table->string('table_name');
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->text('affected_columns')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('primary_key')->nullable();
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
        Schema::dropIfExists('audit_trails');
    }
}
