<?php

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\SkripsiAddRequest;
use App\Http\Requests\SkripsiUpdateRequest;
use App\Models\Skripsi;
use App\Services\SkripsiService;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class SkripsiServiceImpl implements SkripsiService
{
    use Media;


    function add(SkripsiAddRequest $request): Skripsi
    {

        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $pembimbing1 = $request->input('pembimbing1');
        $pembimbing2 = $request->input('pembimbing2');
        $judulSkripsi = $request->input('judul_skripsi');
        $kodeSkripsi = $request->input('kode_skripsi');
        $tahun = $request->input('tahun');
        $abstrak = $request->input('abstrak');
        try {
            DB::beginTransaction();
            $skripsi = new Skripsi([
                'nim' => $nim,
                'nama' => $nama,
                'prodi' => $prodi,
                'pembimbing1' => $pembimbing1,
                'pembimbing2' => $pembimbing2,
                'judul_skripsi' => $judulSkripsi,
                'kode_skripsi' => $kodeSkripsi,
                'tahun' => $tahun,
                'abstrak' => $abstrak,
                'file_url' => null,
                'file_path' => null,
            ]);
            $skripsi->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }


    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $paginate = Skripsi::where('judul_skripsi', 'like', '%' . $key . '%')
            ->orWhere('nim', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $paginate;
    }

    function update(SkripsiUpdateRequest $request, int $id): Skripsi
    {
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $pembimbing1 = $request->input('pembimbing1');
        $pembimbing2 = $request->input('pembimbing2');
        $judulSkripsi = $request->input('judul_skripsi');
        $kodeSkripsi = $request->input('kode_skripsi');
        $tahun = $request->input('tahun');
        $abstrak = $request->input('abstrak');

        $skripsi = Skripsi::find($id);

        try {
            $skripsi->nim = $nim;
            $skripsi->nama = $nama;
            $skripsi->prodi = $prodi;
            $skripsi->pembimbing1 = $pembimbing1;
            $skripsi->pembimbing2 = $pembimbing2;
            $skripsi->judul_skripsi = $judulSkripsi;
            $skripsi->kode_skripsi = $kodeSkripsi;
            $skripsi->tahun = $tahun;
            $skripsi->abstrak = $abstrak;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception);
        }

        return $skripsi;
    }


    function addFile(int $id, $file): Skripsi
    {
        $skripsi = Skripsi::find($id);


        try {
            $dataFile = $this->uploads($file, 'skripsi/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $skripsi->file_url = $fileUrl;
            $skripsi->file_path = $filePath;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }


    function delete(int $id): void
    {
        $skripsi = Skripsi::find($id);
        try {
            if (Storage::disk('s3')->exists($skripsi->file_path)) {
                Storage::disk('s3')->delete($skripsi->file_path);
            }
            if (Storage::disk('s3')->exists($skripsi->gambar_path)) {
                Storage::disk('s3')->delete($skripsi->gambar_path);
            }
            $skripsi->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function deleteFile(int $id, $file): Skripsi
    {
        $skripsi = Skripsi::find($id);

        try {
            if (Storage::disk('s3')->exists($skripsi->file_path)) {
                Storage::disk('s3')->delete($skripsi->file_path);
            }
            $skripsi->file_url = null;
            $skripsi->file_path = null;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }

    function editFile(int $id, $file): Skripsi
    {
        $skripsi = Skripsi::find($id);

        try {
            if (Storage::disk('s3')->exists($skripsi->file_path)) {
                Storage::disk('s3')->delete($skripsi->file_path);
            }

            $dataFile = $this->uploads($file, 'skripsi/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $skripsi->file_path = $filePath;
            $skripsi->file_url = $fileUrl;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }

    function addImage($image, int $id): Skripsi
    {
        $skripsi = Skripsi::find($id);

        try {
            if (Storage::disk('s3')->exists($skripsi->gambar_path)) {
                Storage::disk('s3')->delete($skripsi->gambar_path);
            }
            $dataFile = $this->uploads($image, 'skripsi/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $skripsi->gambar_path = $filePath;
            $skripsi->gambar_url = $fileUrl;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }

    function updateImage($image, int $id): Skripsi
    {
        $skripsi = Skripsi::find($id);

        try {
            if (Storage::disk('s3')->exists($skripsi->gambar_path)) {
                Storage::disk('s3')->delete($skripsi->gambar_path);
            }
            $dataFile = $this->uploads($image, 'skripsi/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $skripsi->gambar_path = $filePath;
            $skripsi->gambar_url = $fileUrl;
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }


    function deleteImage(int $id): Skripsi
    {
        $skripsi = Skripsi::find($id);

        try {
            $skripsi->gambar_url = null;
            $skripsi->gambar_path = null;
            if (Storage::disk('s3')->exists($skripsi->gambar_path)) {
                Storage::disk('s3')->delete($skripsi->gambar_path);
            }
            $skripsi->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $skripsi;
    }
}
