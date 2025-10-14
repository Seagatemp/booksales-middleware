<?php

namespace App\Models;

class Genre
{
    public static function all()
    {
        return [
            ['id' => 1, 'nama' => 'Fiksi'],
            ['id' => 2, 'nama' => 'Non-Fiksi'],
            ['id' => 3, 'nama' => 'Fantasi'],
            ['id' => 4, 'nama' => 'Romantis'],
            ['id' => 5, 'nama' => 'Petualangan'],
        ];
    }
}
