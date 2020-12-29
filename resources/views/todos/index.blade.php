@extends('todos.layout')

@section('content')
        <h1 class="d-flex justify-content-center page-title">All Your Todos</h1>
        <hr class="hr-1">
        <ul class="list-group">
            @foreach($todos as $todo)
            <li class="d-flex justify-content-center list-group-item">
                {{$todo->title}}
            </li>
            @endforeach
        </ul>
@endsection