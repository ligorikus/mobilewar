<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapFieldFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_field_farms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('map_field_id')->index();
            $table->unsignedInteger('farm_level_id')->index();
            $table->timestamps();

            $table->foreign('farm_level_id')
                ->references('id')
                ->on('farm_levels')
                ->onDelete('cascade');

            $table->foreign('map_field_id')
                ->references('id')
                ->on('map_fields')
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
        Schema::dropIfExists('map_field_farms');
    }
}
