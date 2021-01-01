@extends('todos.layout')

@section('content')
<div>
    <h1 class="d-flex justify-content-center page-title">
        All Your Todos
        <div class="d-flex justify-content-center buttons">
            <!-- <a class="btn btn-primary" id="addTitle-btn" href="/todos/create" role="button"></a> -->
            <a class="fas fa-plus-circle icon-create" href="{{route('todo.create')}}"></a>
        </div>
    </h1>
    <hr class="hr-1">

    <x-alert />
    <ul class="list-group">
        
        <!-- Text for when there are no Tasks -->
        @if($todos->isEmpty())
            <div class="d-flex justify-content-center">No tasks available, Create one?</div>
        @endif

        <!-- List of Tasks -->
        @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center" id="vertical-align-item">
                <div>
                    @include('todos.complete-button')
                </div>

                @if($todo->completed)
                    <a>
                        <s>{{$todo->title}}</s>
                    </a>
                @else
                    <a href="{{route('todo.show', $todo->id)}}" >
                        {{$todo->title}}
                    </a>
                @endif
                <div>
                    <!-- <a class="btn btn-primary" id="Default-btn" href="{{'/todos/'.$todo->id.'/edit'}}" role="button"></a> -->
                    <a class="fas fa-edit icon-edit" href="{{route('todo.edit', $todo->id)}}"></a>

                    <!-- <a class="fas fa-trash icon-trash" href="{{route('todo.edit', $todo->id)}}"></a> -->
                    <a onclick="event.preventDefault();
                                    console.log('{{$todo->title}}'); 
                                    if(confirm('Are you sure you want to delete \'{{$todo->title}}\'?'))
                                    {
                                        document.getElementById('form-delete-{{$todo->id}}')
                                        .submit();
                                    }"
                                    class="fas fa-trash icon-trash" href="{{route('todo.edit', $todo->id)}}"
                                    data-toggle="modal" data-target="#exampleModal"></a>
                    
                    <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy',$todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection