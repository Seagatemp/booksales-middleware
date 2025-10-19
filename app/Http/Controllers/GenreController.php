<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Tampilkan data
    public function index()
    {
        return response()->json(Genre::all(), 200);
    }

    // Simpan data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);
        return response()->json($genre, 201);
    }

    // Tampilkan data berdasarkan id
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        return response()->json($genre, 200);
    }

    // Update data berdasarkan id
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->update($validated);
        return response()->json($genre, 200);
    }

    // Hapus data berdasarkan ID
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Genre tidak ditemukan'], 404);
        }

        $genre->delete();
        return response()->json(['message' => 'Genre berhasil dihapus'], 200);
    }
}
