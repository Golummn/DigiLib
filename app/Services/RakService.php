<?php


namespace App\Services;

use App\Models\Rak;
use Illuminate\Pagination\LengthAwarePaginator;

interface RakService
{

    function add($nama): Rak;
    function list(string $key, int $size): LengthAwarePaginator;
    function update($nama, $id): Rak;
    function delete(int $id): void;
}
