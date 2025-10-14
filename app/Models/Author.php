<?php

namespace App\Models;

class Author
{
    public static function all()
    {
        return [
            ['id' => 1, 'nama' => 'Tere Liye'],
            ['id' => 2, 'nama' => 'Andrea Hirata'],
            ['id' => 3, 'nama' => 'J.K. Rowling'],
            ['id' => 4, 'nama' => 'George R.R. Martin'],
            ['id' => 5, 'nama' => 'Agatha Christie'],
        ];
    }
}
