@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">Update Todo</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="" method="post" action="{{route('todo.update',[$todo->id])}}">
        @csrf
        @method('patch')
        <div class="d-flex justify-content-center">
            <input type="text" value="{{$todo->title}}" name="title" id="item-title" placeholder="Title">
        </div>
        <!-- <input type="submit" value="Create" class="btn btn-primary" id="add-btn"> -->
        <div class="d-flex justify-content-center">
            <textarea name="description" id="item-description" rows="2" cols="50" placeholder="Description">{{$todo->description}}</textarea>
        </div>
        
        <!-- @csrf
        <input type="text" value="{{$todo->title}}" name="title" id="item-title"> -->

        @livewire('edit-step', ['steps' => $todo->steps])

        <div class="d-flex justify-content-center">
            <button type="submit" value="Update" class="btn btn-primary" id="Default-btn">Update</button>
        </div>
        
    </form>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="Back-btn" href="{{route('todo.index')}}" role="button">Back to List</a>
    </div>
@endsection