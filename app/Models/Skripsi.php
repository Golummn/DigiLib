<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $table = 'skripsi';

    protected $fillable = ['nim', 'nama', 'prodi', 'pembimbing1', 'pembimbing2', 'judul_skripsi', 'tahun', 'kode_skripsi', 'abstrak', 'file', 'rak_id'];

}
