@extends('todos.layout')

@section('content')
<div>
    <h1 class="d-flex justify-content-center page-title">All Your Todos</h1>
    <hr class="hr-1">

    <div class="d-flex justify-content-center buttons">
        <a class="btn btn-primary" id="addTitle-btn" href="/todos/create" role="button">Create New</a>
    </div>
    <hr class="hr-1">

    <x-alert />
    <ul class="list-group">
        @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center" id="vertical-align-item">
                {{$todo->title}}
                <a class="btn btn-primary" id="addTitle-btn" href="{{'/todos/'.$todo->id.'/edit'}}" role="button">Edit</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection