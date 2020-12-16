<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit()
    {
        return view('todos.edit');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];
        $messages = [
            'title.max' => 'Title should not be greater than 255 chars',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withinput();
        }
        
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);
        Todo::create($request->all());
        return redirect()->back()->with('message','Todo Created Successfully');
    }
}
