<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildConstructionConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_construction_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build_id')->index();
            $table->unsignedInteger('build_condition_id');
            $table->unsignedInteger('build_condition_type');
            $table->unsignedInteger('level');

            $table->foreign('build_id')
                ->references('id')
                ->on('builds')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('build_construction_conditions');
    }
}