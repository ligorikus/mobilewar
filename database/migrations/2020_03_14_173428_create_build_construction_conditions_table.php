<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->boolean('not_build')->default(false);

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
