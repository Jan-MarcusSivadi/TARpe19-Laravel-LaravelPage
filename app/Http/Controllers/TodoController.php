<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        // return $todos;
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit()
    {
        return view('todos.edit');
    }

    public function store(TodoCreateRequest $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);
        Todo::create($request->all());
        return redirect()->back()->with('message','Todo Created Successfully');
    }
}
