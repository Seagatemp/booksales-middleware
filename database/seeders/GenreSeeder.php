<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh data genre
        $genres = [
            ['name' => 'Fiksi'],
            ['name' => 'Non-Fiksi'],
            ['name' => 'Misteri'],
            ['name' => 'Romansa'],
            ['name' => 'Fantasi']
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
