<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Bumi', 'author_id' => 1],
            ['title' => 'Edensor', 'author_id' => 1],
            ['title' => 'Laskar Pelangi', 'author_id' => 2],
            ['title' => 'Harry Potter', 'author_id' => 3],
            ['title' => 'Game of Thrones', 'author_id' => 4],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
