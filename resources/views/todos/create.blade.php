@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">What do you need to do next?</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="" method="post" action="{{route('todo.store')}}">
        @csrf
        <div class="d-flex justify-content-center">
            <input type="text" name="title" id="item-title" placeholder="Title">
            <button type="submit" value="Create" class="btn btn-primary" id="Default-btn">Create</button>
        </div>
        <!-- <input type="submit" value="Create" class="btn btn-primary" id="add-btn"> -->
        <div class="d-flex justify-content-center">
            <textarea name="description" id="item-description" rows="2" cols="50" placeholder="Description"></textarea>
        </div>
    </form>
        
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="addTitle-btn" href="{{route('todo.index')}}" role="button">Back to List</a>
    </div>
@endsection