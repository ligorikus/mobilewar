<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farm_id')->index();
            $table->unsignedInteger('level')->default(0);
            $table->unsignedInteger('population')->default(0);
            $table->unsignedInteger('culture')->default(0);
            $table->unsignedInteger('production')->default(0);

            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
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
        Schema::dropIfExists('farm_levels');
    }
}
