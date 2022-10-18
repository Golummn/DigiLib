<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkripsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skripsi', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->string('pembimbing1');
            $table->string('pembimbing2')->nullable();
            $table->string('judul_skripsi');
            $table->string('tahun');
            $table->string('kode_skripsi');
            $table->text('abstrak');
            $table->string('file_url')->nullable();
            $table->string('file_path')->nullable();
            $table->string('gambar_url')->nullable();
            $table->string('gambar_path')->nullable();
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
        Schema::dropIfExists('skripsi');
    }
}
