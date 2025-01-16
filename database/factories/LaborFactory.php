<?php

namespace Database\Factories;

use App\Models\Labor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class LaborFactory extends Factory
{
    protected $model = Labor::class;

    public function definition()
    {
        // Ambil daftar file gambar dari folder public/images (sesuaikan path jika berbeda)
        $imagePath = public_path('images');
        $images = File::exists($imagePath) ? File::files($imagePath) : [];

        // Pilih gambar secara acak (jika folder tidak kosong)
        $randomImage = count($images) > 0
            ? 'images/' . $images[array_rand($images)]->getFilename()
            : null;

        return [
            'name' => $this->faker->company,                      // Nama laboratorium acak
            'location' => $this->faker->city,                     // Lokasi acak
            'capacity' => $this->faker->numberBetween(10, 100),   // Kapasitas acak
            'photo' => $randomImage,                              // Path ke gambar di folder public
            'description' => $this->faker->paragraph(2),          // Deskripsi acak (2 paragraf)
            'facilities' => implode(', ', $this->faker->words(5)), // Fasilitas (daftar kata acak)
            'created_at' => now(),                                // Timestamp saat ini
            'updated_at' => now(),
        ];
    }
}
