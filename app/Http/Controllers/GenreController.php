<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // Read All (publik)
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres, 200);
    }

    // Show (publik)
    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['error' => 'Genre not found'], 404);
        }
        return response()->json($genre, 200);
    }

    // Create (admin)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $genre = Genre::create([
            'name' => $request->name
        ]);

        return response()->json($genre, 201);
    }

    // Update (admin)
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['error' => 'Genre not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $genre->update([
            'name' => $request->name
        ]);

        return response()->json($genre, 200);
    }

    // Destroy (admin)
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['error' => 'Genre not found'], 404);
        }

        $genre->delete();
        return response()->json(['message' => 'Genre deleted'], 200);
    }
}
