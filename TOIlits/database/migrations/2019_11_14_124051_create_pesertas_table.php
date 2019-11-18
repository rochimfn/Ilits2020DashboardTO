<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('user_id');
            $table->string('asal_sekolah');
            $table->unsignedBigInteger('forda_id');
            $table->string('no_wa');
            $table->string('bukti_bayar');
            $table->tinyInteger('status');
            $table->foreign('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('peserta');
    }
}
