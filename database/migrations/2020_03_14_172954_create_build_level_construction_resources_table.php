<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildLevelConstructionResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_level_construction_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build_level_id')->index();
            $table->unsignedInteger('game_resource_id')->index();
            $table->integer('value');

            $table->foreign('build_level_id')
                ->references('id')
                ->on('build_levels')
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
        Schema::dropIfExists('build_level_construction_resources');
    }
}
