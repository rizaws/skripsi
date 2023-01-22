<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_disposisis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sm');
            $table->integer('no_surat');
            $table->string('no_agenda');
            $table->date('tgl_disposisi');
            $table->string('isi_disposisi');
            $table->integer('id_js');
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
        Schema::dropIfExists('surat_disposisis');
    }
}
