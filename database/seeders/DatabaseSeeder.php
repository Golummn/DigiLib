<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Rak;
use App\Models\Skripsi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Rak::factory(10)->create();
        Buku::factory(20)->create();
        Skripsi::factory(20)->create();
    }
}
