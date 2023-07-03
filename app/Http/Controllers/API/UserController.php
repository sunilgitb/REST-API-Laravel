<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            // Check if the user already exists by email
            $user = User::firstOrCreate(['email' => $validatedData['email']], $validatedData);

            if (!$user->wasRecentlyCreated) {
                throw new \Exception('The email address is already in use.');
            }

            return response()->json(['user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     return response()->json(['user' => $user]);
    // }
    public function show()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }


    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'password' => 'sometimes|min:6',
        ]);

        // Find the user
        $user = auth()->user();

        // Update the user
        $user->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }


    public function destroy($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }

    // public function destroy()
    // {
    //     // Find the user
    //     $user = auth()->user();

    //     // Delete the user
    //     $user->delete();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'User deleted successfully'
    //     ]);
    // }
}
