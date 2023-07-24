<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    

    public function index()
    {
        $user = Auth::user();
        $todos = $user->todos;
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        // Validate input

        $user = Auth::user();
        $todo = new Todo;
        $todo->user_id = $user->id;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return response()->json(['message' => 'Todo created successfully']);
    }

    public function update(Request $request, Todo $todo)
    {
        // Validate input

        $user = Auth::user();

        if ($todo->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $todo->update($request->all());

        return response()->json(['message' => 'Todo updated successfully']);
    }

    public function destroy(Todo $todo)
    {
        $user = Auth::user();

        if ($todo->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }

}
