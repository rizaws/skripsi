<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalmapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalmapel', function (Blueprint $table) {
            $table->integerIncrements('id_jadwalmapel');
            $table->integer('id_mapel');
            $table->integer('id_kelas');
            $table->integer('id_hari');
            $table->integer('id_jam');
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
        Schema::dropIfExists('jadwalmapel');
    }
}
