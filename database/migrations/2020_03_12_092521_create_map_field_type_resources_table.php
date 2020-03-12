<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapFieldTypeResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_field_type_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('map_field_type_id')->nullable();
            $table->unsignedInteger('game_resource_id')->index();
            $table->unsignedInteger('count');

            $table->foreign('map_field_type_id')
                ->references('id')
                ->on('map_field_types')
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
        Schema::dropIfExists('map_field_type_resources');
    }
}
