<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFordasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('daerah',30);
            $table->string('id_line',30);
            $table->string('uname_ig',30);
            $table->string('nama_ketua');
            $table->string('nrp',15);
            $table->string('hp_ketua',30);
            $table->string('id_line_ketua',30);
            $table->string('nama_perwakilan');
            $table->string('hp_perwakilan',30);
            $table->string('id_line_perwakilan',30);
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('forda');
    }
}
