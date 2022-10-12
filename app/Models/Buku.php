<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['judul_buku', 'kode_buku', 'rak_id', 'penerbit', 'pengarang', 'tahun_terbit', 'jumlah_buku', 'deskripsi', 'gambar'];

}
