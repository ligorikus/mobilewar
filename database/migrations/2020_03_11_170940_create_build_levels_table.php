<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build_id')->index();
            $table->unsignedInteger('level')->default(0);
            $table->unsignedInteger('population')->default(0);
            $table->unsignedInteger('culture')->default(0);

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
        Schema::dropIfExists('build_levels');
    }
}
