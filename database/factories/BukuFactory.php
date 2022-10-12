<?php

namespace Database\Factories;

use App\Models\Rak;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'judul_buku' => $this->faker->name(),
            'kode_buku' => $this->faker->uuid(),
            'penerbit' => $this->faker->name(),
            'pengarang' => $this->faker->name(),
            'tahun_terbit' => $this->faker->date('Y'),
            'jumlah_buku' => $this->faker->numberBetween(10, 100),
            'deskripsi' => $this->faker->sentence(),
            'gambar_url' => null,
            'gambar_path' => null,

        ];
    }
}
