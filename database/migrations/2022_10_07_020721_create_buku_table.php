<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('kode_buku');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->string('tahun_terbit');
            $table->string('jumlah_buku');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('buku');
    }
}
