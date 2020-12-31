@extends('todos.layout')

@section('content')
<div>
    <h1 class="d-flex justify-content-center page-title">All Your Todos</h1>
    <hr class="hr-1">

    <div class="d-flex justify-content-center buttons">
        <!-- <a class="btn btn-primary" id="addTitle-btn" href="/todos/create" role="button"></a> -->
        <a class="fas fa-plus-circle icon-create" href="/todos/create"></a>
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
                        <i onclick="event.preventDefault();
                                document.getElementById('form-incomplete-{{$todo->id}}')
                                .submit();"
                                class="fas fa-check icon2-on"></i>

                        <form style="display: none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
                            @csrf
                            @method('delete')
                        </form>
                    @else
                        <i onclick="event.preventDefault();
                                document.getElementById('form-complete-{{$todo->id}}')
                                .submit();"
                                class="fas fa-check icon2-off cursor-pointer"></i>

                        <form style="display: none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
                            @csrf
                            @method('put')
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection