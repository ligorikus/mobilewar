<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmLevelConstructionResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_level_construction_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_level_id')->index();
            $table->unsignedInteger('game_resource_id')->index();
            $table->integer('value');

            $table->foreign('farm_level_id')
                ->references('id')
                ->on('farm_levels')
                ->onDelete('cascade');

            $table->foreign('game_resource_id')
                ->references('id')
                ->on('game_resources')
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
        Schema::dropIfExists('farm_level_construction_resources');
    }
}
