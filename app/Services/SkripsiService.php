<?php

namespace App\Services;

use App\Http\Requests\SkripsiAddRequest;
use App\Http\Requests\SkripsiUpdateRequest;
use App\Models\Skripsi;
use Illuminate\Pagination\LengthAwarePaginator;

interface SkripsiService
{
    function add(SkripsiAddRequest $request): Skripsi;
    function list(string $key, int $size): LengthAwarePaginator;
    function update(SkripsiUpdateRequest $request, int $id): Skripsi;
    function delete(int $id): void;
    function addFile(int $id, $file): Skripsi;
    function editFile(int $id, $file): Skripsi;
    function addImage($file, int $id): Skripsi;
    function updateImage($file, int $id): Skripsi;
}
