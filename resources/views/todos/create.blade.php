@extends('todos.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">What do you need to do next?</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="d-flex justify-content-center" method="post" action="/todos/create">
        @csrf
        <input type="text" name="title" id="item-title">
        <button type="submit" value="Create" class="btn btn-primary" id="addTitle-btn">Create</button>
        <!-- <input type="submit" value="Create" class="btn btn-primary" id="add-btn"> -->
    </form>
@endsection