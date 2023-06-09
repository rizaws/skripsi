<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integerIncrements('id_siswa');
            $table->string('nama');
            $table->string('nisn');
            $table->string('id_kelas');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('nm_ayah');
            $table->string('nm_ibu');
            $table->string('email');
            $table->string('no_telp');
            $table->string('alamat');
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
        Schema::dropIfExists('siswa');
    }
}
