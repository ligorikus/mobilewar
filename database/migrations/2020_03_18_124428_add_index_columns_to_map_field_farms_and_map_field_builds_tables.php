<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexColumnsToMapFieldFarmsAndMapFieldBuildsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_field_farms', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });
        Schema::table('map_field_builds', function (Blueprint $table) {
            $table->integer('index')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_field_farms', function (Blueprint $table) {
            $table->dropColumn('index');
        });
        Schema::table('map_field_builds', function (Blueprint $table) {
            $table->dropColumn('index');
        });
    }
}
