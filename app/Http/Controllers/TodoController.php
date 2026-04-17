<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $todos = Todo::when($search, function ($query) use ($search) {
            return $query->where('task', 'like', "%$search%");
        })->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3|max:255'
        ]);
    
        Todo::create($request->all());
    
        return redirect('/todos')->with('success', 'Todo added successfully!');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'task' => 'required|min:3|max:255'
    ]);

    $todo = Todo::find($id);
    $todo->update($request->all());

    return redirect('/todos')->with('success', 'Todo updated!');
}

    public function destroy($id)
    {
        Todo::destroy($id);

        return redirect('/todos')->with('success', 'Todo deleted!');
    }
}