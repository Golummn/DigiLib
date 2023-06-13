<?php

namespace App\Imports;

use App\Models\Buku;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BukuImport implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row[0] == null) {
                continue;
            } else {
                Buku::updateOrCreate([
                    "kode_buku" => $row[2]
                ], [
                    "judul_buku" => $row[1],
                    "kode_buku" => $row[2],
                    "penerbit" => $row[3],
                    "pengarang" => $row[4],
                    "deskripsi" => $row[6],
                    "tahun_terbit" => $row[5],
                    "jumlah_buku" => $row[7]
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
