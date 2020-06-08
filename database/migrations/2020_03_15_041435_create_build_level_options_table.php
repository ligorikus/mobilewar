<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildLevelOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_level_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build_level_id')->index();
            $table->unsignedInteger('build_level_option_type_id')->index();
            $table->string('value');

            $table->foreign('build_level_id')
                ->references('id')
                ->on('build_levels')
                ->onDelete('cascade');

            $table->foreign('build_level_option_type_id')
                ->references('id')
                ->on('build_level_option_types')
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
        Schema::dropIfExists('build_level_options');
    }
}
