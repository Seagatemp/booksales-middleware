<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // Read All (publik)
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors, 200);
    }

    // Show (publik)
    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return response()->json($author, 200);
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

        $author = Author::create([
            'name' => $request->name
        ]);

        return response()->json($author, 201);
    }

    // Update (admin)
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $author->update([
            'name' => $request->name
        ]);

        return response()->json($author, 200);
    }

    // Destroy (admin)
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $author->delete();
        return response()->json(['message' => 'Author deleted'], 200);
    }
}
