<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = [
            ['id' => 1, 'name' => 'Fiksi'],
            ['id' => 2, 'name' => 'Drama'],
            ['id' => 3, 'name' => 'Fantasi'],
            ['id' => 4, 'name' => 'Petualangan'],
            ['id' => 5, 'name' => 'Misteri'],
        ];

        return response()->json($genres);
    }
}
