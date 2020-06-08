<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildLevelConstructionTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_level_construction_times', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build_level_id')->index();
            $table->unsignedInteger('time');

            $table->foreign('build_level_id')
                ->references('id')
                ->on('build_levels')
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
        Schema::dropIfExists('build_level_construction_times');
    }
}
