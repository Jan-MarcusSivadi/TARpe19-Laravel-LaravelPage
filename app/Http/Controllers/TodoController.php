<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //->except('index');
    }

    public function index()
    {
        $todos = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo Created Successfully!');
        //return redirect()->back()->with('message','Todo Created Successfully!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message','Todo Updated Successfully!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','Task Marked as Completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','Task Marked as Incompleted!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted!');
    }

}
