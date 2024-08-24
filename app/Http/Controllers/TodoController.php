<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        Todo::create(['title' => $request->title]);

        return redirect()->route('home')->with('success', 'Todo saved');
    }

    public function destroy(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('home')->with('success', 'Todo deleted');
    }

    public function toggleStatus(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = $todo->status === 'Done' ? 'Not Done' : 'Done';
        $todo->save();
        return redirect()->route('home')->with('success', 'Todo modified');
    }
}
