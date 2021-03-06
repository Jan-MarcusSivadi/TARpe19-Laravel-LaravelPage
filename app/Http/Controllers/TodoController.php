<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Step;
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
        //dd(auth()->user()->todos);
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        // dd($request->all());
        // dd(auth()->user()->todos());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step) {
            foreach($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        // dd($test);
        //$userId = auth()->id();
        //$request['user_id'] = $userId;
        // Todo::create($request->all());
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
        $todo->update(['description' => $request->description]);
        if($request->stepName) {
            foreach($request->stepName as $key => $value ) {
                $id = $request->stepId[$key];
                
                if(!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
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
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted!');
    }

}
