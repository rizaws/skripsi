<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat');
            $table->date('tgl_surat');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('sifat_surat');
            $table->string('ditujukan');
            $table->string('berkas');
            $table->string('petugas');
            $table->string('status_disposisi');
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
        Schema::dropIfExists('surat_masuk');
    }
}
