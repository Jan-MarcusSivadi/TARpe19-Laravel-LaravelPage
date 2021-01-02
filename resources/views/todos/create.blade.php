@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">What do you need to do next?</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="" method="post" action="{{route('todo.store')}}">
        @csrf
        <div class="d-flex justify-content-center">
            <input type="text" name="title" id="item-title" placeholder="Title">
        </div>

        <!-- <input type="submit" value="Create" class="btn btn-primary" id="add-btn"> -->

        <div class="d-flex justify-content-center">
            <textarea name="description" id="item-description" rows="2" cols="50" placeholder="Description"></textarea>
        </div>

        <hr class="hr-1">
        @livewire('step')
        <div class="d-flex justify-content-center">
            <button type="submit" value="Create" class="btn btn-primary" id="Default-btn">Create</button>
        </div>

    </form>

    

    <form class="" method="post" action="{{route('todo.store')}}">
        @csrf
        <!-- <div class="d-flex justify-content-center">
            <button type="submit" value="Create" class="btn btn-primary" id="Step-btn">Add step</button>
        </div> -->

    </form>
    
        
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="Back-btn" href="{{route('todo.index')}}" role="button">Back to List</a>
    </div>
@endsection