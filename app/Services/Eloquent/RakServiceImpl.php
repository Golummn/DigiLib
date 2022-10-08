<?php

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Models\Rak;
use App\Services\RakService;
use Illuminate\Pagination\LengthAwarePaginator;

class RakServiceImpl implements RakService
{

    function add($nama): Rak
    {
        try {
            $rak = new Rak([
                'nama_rak' => $nama,
            ]);

            $rak->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $rak;
    }


    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $rak = Rak::where('nama_rak', 'like', '%' . $key . '%')
            ->orderBy('id', 'DESC')->paginate($size);

        return $rak;
    }

    function update($nama, $id): Rak
    {
        $rak = Rak::find($id);

        try {
            $rak->nama_rak = $nama;
            $rak->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $rak;
    }

    function delete(int $id): void
    {
        $rak = Rak::find($id);

        try {
            $rak->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }
}
