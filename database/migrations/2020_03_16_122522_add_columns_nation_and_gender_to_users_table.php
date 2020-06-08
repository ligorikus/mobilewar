<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsNationAndGenderToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('gender')->default(0)->comment('0 - man, 1 - woman');
            $table->unsignedInteger('nation_id')->index()->nullable();

            $table->foreign('nation_id')
                ->references('id')
                ->on('nations')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_nation_id_foreign');
            $table->dropColumn('gender');
            $table->dropColumn('nation_id');
        });
    }
}
