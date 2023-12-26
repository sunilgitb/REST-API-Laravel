<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $books = Book::all();
            return response()->json($books, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch books'], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'author' => 'required|string',
                // Add validation rules for other fields if needed
            ]);

            $book = Book::create($validatedData);
            return response()->json($book, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to store book'], 500);
        }
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'author' => 'required|string',
                // Add validation rules for other fields if needed
            ]);

            $book->update($validatedData);

            return response()->json($book, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update book'], 500);
        }
    }

    public function destroy(Book $book): JsonResponse
    {
        try {
            $book->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete book'], 500);
        }
    }
}