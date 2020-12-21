<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlateIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plate_ingredients', function (Blueprint $table) {
            $table->id();
            $table->integer('plate_id');
            $table->integer('ingredient_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plate_ingredients');
    }
}
