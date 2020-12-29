@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">Update Todo</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="d-flex justify-content-center" method="post" action="{{route('todo.update',[$todo->id])}}">
        @csrf
        @method('patch')
        <input type="text" value="{{$todo->title}}" name="title" id="item-title">
        <button type="submit" value="Update" class="btn btn-primary" id="addTitle-btn">Update</button>
    </form>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="addTitle-btn" href="/todos" role="button">Back to List</a>
    </div>
@endsection