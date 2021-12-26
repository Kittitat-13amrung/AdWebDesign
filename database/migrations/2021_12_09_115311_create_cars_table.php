<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make', '64');
            $table->string('model', '100');
            $table->mediumInteger('price');
            $table->float('engine_size');
            // $table->integer('image_id')->unsigned();
            // $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            // $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
