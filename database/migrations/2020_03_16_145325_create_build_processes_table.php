<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('map_field_id')->index();
            $table->unsignedInteger('build_id');
            $table->string('build_type');
            $table->float('progress');
            $table->boolean('status')->default(false);
            $table->timestamps();
            
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
        Schema::dropIfExists('build_processes');
    }
}
