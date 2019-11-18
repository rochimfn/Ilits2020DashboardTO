<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoWATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_wa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('forda_id');
            $table->string('no_wa');
            $table->foreign('forda_id')->references('id')->on('forda');
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
        Schema::dropIfExists('no_wa');
    }
}
