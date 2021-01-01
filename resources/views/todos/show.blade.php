@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">{{$todo->title}}</h1>
    <hr class="hr-1">
    
    <div class="d-flex justify-content-center">
        <div id="show-description">{{$todo->description}}</div>
    </div>

    @if($todo->steps->count() > 0)
        <h2 class="d-flex justify-content-center" style="padding-top: 1rem">Steps for this task</h2>
        <hr class="hr-1">

        @foreach($todo->steps as $step)
            <li class="list-group-item d-flex justify-content-center align-items-center" id="vertical-align-item">
                <a>
                    {{$step->name}}
                </a>
            </li>
        @endforeach
    @endif
        
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="Back-btn" href="{{route('todo.index')}}" role="button">Back to List</a>
    </div>
@endsection