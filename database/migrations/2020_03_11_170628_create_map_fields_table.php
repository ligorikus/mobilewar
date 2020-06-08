<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('x_coord');
            $table->integer('y_coord');
            $table->unsignedInteger('map_field_type_id')->nullable();

            $table->foreign('map_field_type_id')
                ->references('id')
                ->on('map_field_types')
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
        Schema::dropIfExists('map_fields');
    }
}
