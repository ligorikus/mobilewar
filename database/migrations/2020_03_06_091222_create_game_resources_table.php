<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();
            
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
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
        Schema::dropIfExists('game_resources');
    }
}
