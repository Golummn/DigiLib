<?php

namespace Database\Factories;

use App\Models\Rak;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkripsiFactory extends Factory
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
            'nim' => $this->faker->uuid(),
            'nama' => $this->faker->name(),
            'prodi' => $this->faker->name(),
            'pembimbing1' => $this->faker->name(),
            'pembimbing2' => $this->faker->name(),
            'judul_skripsi' => $this->faker->name(),
            'tahun' => $this->faker->date('Y'),
            'kode_skripsi' => $this->faker->uuid(),
            'abstrak' => $this->faker->sentence(),
            'file_url' => null,
            'file_path' => null,
            'rak_id' => Rak::factory()->create()->id,
        ];
    }
}
