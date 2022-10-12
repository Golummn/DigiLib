<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\SkripsiAddRequest;
use App\Http\Requests\SkripsiUpdateRequest;
use App\Models\Skripsi;

interface SkripsiService
{
    function add(SkripsiAddRequest $request): Skripsi;
    function list(string $key): Collection;
    function update(SkripsiUpdateRequest $request, int $id): Skripsi;
    function delete(int $id): void;
    function addFile(int $id, $file): Skripsi;
    function editFile(int $id, $file): Skripsi;
    function deleteFile(int $id, $file): Skripsi;
}
