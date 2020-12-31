@extends('todos.layout')

@section('content')
<div>
    <h1 class="d-flex justify-content-center page-title">All Your Todos</h1>
    <hr class="hr-1">

    <div class="d-flex justify-content-center buttons">
        <a class="btn btn-primary" id="addTitle-btn" href="/todos/create" role="button">Create New</a>
    </div>

    <x-alert />
    <ul class="list-group">
        @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center" id="vertical-align-item">
                @if($todo->completed)
                    <s>{{$todo->title}}</s>
                @else
                    {{$todo->title}}
                @endif
                <div>
                    <!-- <a class="btn btn-primary" id="Default-btn" href="{{'/todos/'.$todo->id.'/edit'}}" role="button"> -->
                       <a class="fas fa-edit icon1" href="{{'/todos/'.$todo->id.'/edit'}}"></a>
                    </a>
                    @if($todo->completed)
                        <i class="fas fa-check icon2-on"></i>
                    @else
                        <i class="fas fa-check icon2-off cursor-pointer"></i>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection