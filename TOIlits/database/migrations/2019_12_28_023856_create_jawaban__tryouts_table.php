<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban__tryouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->tinyInteger('pilihan_tryout')->comment('1=saintek,2=soshum');
            $table->tinyInteger('paket');
            for ($x = 1; $x <= 200; $x++) {
                $table->tinyInteger('soal'.$x)->default(null)->nullable();
            } 
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
        Schema::dropIfExists('jawaban__tryouts');
    }
}
