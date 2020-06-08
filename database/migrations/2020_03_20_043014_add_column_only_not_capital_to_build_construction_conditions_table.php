<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnlyNotCapitalToBuildConstructionConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('build_construction_conditions', function (Blueprint $table) {
            $table->boolean('only_not_capital')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('build_construction_conditions', function (Blueprint $table) {
            $table->dropColumn('only_not_capital');
        });
    }
}
