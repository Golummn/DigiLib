<?php

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\BukuAddRequest;
use App\Http\Requests\BukuUpdateRequest;
use App\Models\Buku;
use App\Services\BukuService;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class BukuServiceImpl implements BukuService
{
    use Media;


    function add(BukuAddRequest $request): Buku
    {

        $judulBuku = $request->input('judul_buku');
        $kodeBuku = $request->input('kode_buku');
        $penerbit = $request->input('penerbit');
        $pengarang = $request->input('pengarang');
        $tahunTerbit = $request->input('tahun_terbit');
        $jumlahBuku = $request->input('jumlah_buku');
        $deskripsi = $request->input('deskripsi');
        try {
            DB::beginTransaction();
            $buku = new Buku([
                'judul_buku' => $judulBuku,
                'kode_buku' => $kodeBuku,
                'penerbit' => $penerbit,
                'pengarang' => $pengarang,
                'tahun_terbit' => $tahunTerbit,
                'jumlah_buku' => $jumlahBuku,
                'deskripsi' => $deskripsi,
                'gambar_url' => null,
                'gambar_path' => null,
            ]);
            $buku->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new InvariantException($exception->getMessage());
        }

        return $buku;
    }

    function list(string $key = ''): Collection
    {
        $collection = Buku::where('judul_buku', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->get();

        return $collection;
    }

    function update(BukuUpdateRequest $request, int $id): Buku
    {
        $judulBuku = $request->input('judul_buku');
        $kodeBuku = $request->input('kode_buku');
        $penerbit = $request->input('penerbit');
        $pengarang = $request->input('pengarang');
        $tahunTerbit = $request->input('tahun_terbit');
        $jumlahBuku = $request->input('jumlah_buku');
        $deskripsi = $request->input('deskripsi');

        $buku = Buku::find($id);

        try {
            $buku->judul_buku = $judulBuku;
            $buku->kode_buku = $kodeBuku;
            $buku->penerbit = $penerbit;
            $buku->pengarang = $pengarang;
            $buku->tahun_terbit = $tahunTerbit;
            $buku->jumlah_buku = $jumlahBuku;
            $buku->deskripsi = $deskripsi;
            $buku->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception);
        }

        return $buku;
    }

    function delete(int $id): void
    {
        $buku = Buku::find($id);
        try {
            if ($buku->gambar_path != null) {
                unlink($buku->gambar_path);
            }

            $buku->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function addImage($image, int $id): Buku
    {
        $buku = Buku::find($id);

        try {
            if ($buku->gambar_path != null) {
                unlink($buku->gambar_path);
            }

            $dataFile = $this->uploads($image, 'buku/');
            $filePath = public_path('storage/' . $dataFile['filePath']);
            $fileUrl = asset('storage/' . $dataFile['filePath']);

            $buku->gambar_path = $filePath;
            $buku->gambar_url = $fileUrl;
            $buku->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $buku;
    }

    function updateImage($image, int $id): Buku
    {
        $buku = Buku::find($id);

        try {
            if ($buku->gambar_path != null) {
                unlink($buku->gambar_path);
            }

            $dataFile = $this->uploads($image, 'buku/');
            $filePath = public_path('storage/' . $dataFile['filePath']);
            $fileUrl = asset('storage/' . $dataFile['filePath']);

            $buku->gambar_path = $filePath;
            $buku->gambar_url = $fileUrl;
            $buku->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $buku;
    }


    function deleteImage(int $id): Buku
    {
        $buku = Buku::find($id);

        try {
            if ($buku->gambar_path != null) {
                unlink($buku->gambar_path);
            }

            $buku->gambar_url = null;
            $buku->gambar_path = null;
            $buku->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $buku;
    }
}
