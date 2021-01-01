@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">{{$todo->title}}</h1>
    <hr class="hr-1">
    
    <div class="d-flex justify-content-center">
        <div id="show-description">{{$todo->description}}</div>
    </div>
        
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="addTitle-btn" href="{{route('todo.index')}}" role="button">Back to List</a>
    </div>
@endsection