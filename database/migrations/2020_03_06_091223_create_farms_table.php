<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('game_resource_id')->index();
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('game_resource_id')
                ->references('id')
                ->on('game_resources')
                ->onDelete('cascade');

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
        Schema::dropIfExists('farms');
    }
}
