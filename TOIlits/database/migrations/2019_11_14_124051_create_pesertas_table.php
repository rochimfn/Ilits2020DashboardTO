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
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('user_id');
            $table->string('asal_sekolah');
            $table->unsignedInteger('forda_id');
            $table->string('no_wa');
            $table->string('bukti_bayar')->default(null)->nullable();
            $table->tinyInteger('status');
            $table->string('kartu_pelajar')->default(null)->nullable();
            $table->tinyInteger('pilihan_tryout')->comment('1=saintek,2=soshum,3=campuran');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('forda_id')->references('id')->on('forda')->onDelete('cascade')->onUpdate('cascade');
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
