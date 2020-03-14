<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmLevelConstructionTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_level_construction_times', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_level_id')->index();
            $table->integer('main_build_level');
            $table->unsignedInteger('time');

            $table->foreign('farm_level_id')
                ->references('id')
                ->on('farm_levels')
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
        Schema::dropIfExists('farm_level_construction_times');
    }
}
