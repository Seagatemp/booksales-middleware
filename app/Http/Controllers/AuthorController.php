<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Tampilkan data
    public function index()
    {
        return response()->json(Author::all(), 200);
    }

    // Simpan data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($validated);
        return response()->json($author, 201);
    }

    // Tampilkan data berdasarkan ID
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        return response()->json($author, 200);
    }

    // Update data berdasarkan ID
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($validated);
        return response()->json($author, 200);
    }

    // Hapus data berdasarkan ID
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author tidak ditemukan'], 404);
        }

        $author->delete();
        return response()->json(['message' => 'Author berhasil dihapus'], 200);
    }
}
