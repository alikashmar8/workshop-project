<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShuffledIdeas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shuffledIdeas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ideaSourceId');
            $table->bigInteger('newUserId');
            $table->double('rate');
            $table->bigInteger('workshopId');
            $table->Integer('used');
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
        Schema::dropIfExists('shuffledIdeas');
    }
}
