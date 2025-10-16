<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = ['Tere Liye', 'Andrea Hirata', 'J.K. Rowling', 'George R.R. Martin', 'Agatha Christie'];
        foreach ($authors as $name) {
            Author::create(['name' => $name]);
        }
    }
}
