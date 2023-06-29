<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Modules\Checker;
use App\Modules\History;
use App\Modules\Marker;
use App\Modules\Notification;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('todos.create');
    }

    public function store(Request $request, Checker $checker): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $params = $request->all();
        //we lower title
        $params['title'] = \Illuminate\Support\Str::lower($params['title']);

        //we clear title
        $params['title'] = preg_replace("/[^a-zA-Z]/", "", $params['title']);

        $todo = Todo::create($params);

        // some random action to show black box testing benefit
        if ($checker->isFamily($todo)) {
            $history = new History();
            $history->body = json_encode($params);
            $history->action = 'created';
            $history->save();
        }

        if ($checker->isFriend($todo)) {
            Notification::sendToTelegram($params);
        }

        if ($checker->isImportant($todo)) {
            $marker = new Marker($todo);
            $marker->markImportance();
        }

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
