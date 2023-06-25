<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NilaiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->integerIncrements('id_nilai');
            $table->integer('id_siswa');
            // $table->integer('id_guru');
            $table->integer('id_mapel');
            $table->integer('id_kelas');
            $table->double('nilai');
            $table->string('ket');
            // $table->integer('semester');
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
        //
    }
}
