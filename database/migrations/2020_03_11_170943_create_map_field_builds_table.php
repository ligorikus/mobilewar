<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapFieldBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_field_builds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('map_field_id')->index();
            $table->unsignedInteger('build_level_id')->index();
            $table->timestamps();

            $table->foreign('build_level_id')
                ->references('id')
                ->on('build_levels')
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
        Schema::dropIfExists('map_field_builds');
    }
}
