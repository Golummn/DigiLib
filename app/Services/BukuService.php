<?php


namespace App\Services;

use App\Http\Requests\BukuAddRequest;
use App\Http\Requests\BukuUpdateRequest;
use App\Models\Buku;
use Illuminate\Pagination\LengthAwarePaginator;

interface BukuService
{
    function add(BukuAddRequest $request): Buku;
    function list(string $key, int $size): LengthAwarePaginator;
    function update(BukuUpdateRequest $request, int $id): Buku;
    function delete(int $id): void;
    function addImage($file, int $id): Buku;
    function updateImage($file, int $id): Buku;
    function deleteImage(int $id): Buku;
}
