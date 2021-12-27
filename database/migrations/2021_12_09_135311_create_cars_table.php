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
            $table->dropForeign(['image_id']);

            $table->id();
            $table->string('make', '64');
            $table->string('model', '100');
            $table->mediumInteger('price');
            $table->float('engine_size');
            // $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('restrict');
            $table->bigInteger('image_id')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images')->onUpdate('restrict')->onDelete('cascade');
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
