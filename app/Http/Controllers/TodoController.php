<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Todo::create($request->all());

        return redirect()->route('todos.index')
            ->with('success', 'Todo created successfully.');
    }

    public function edit(int $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Todo::findOrFail($id)->update($request->all());

        return redirect()->route('todos.index')
            ->with('success', 'Todo updated successfully.');
    }

    public function destroy(int $id)
    {
        Todo::whereId($id)->delete();

        return redirect()->route('todos.index')
            ->with('success', 'Todo deleted successfully.');
    }
}
