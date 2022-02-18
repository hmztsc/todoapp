@extends('layouts.base')

@section('title','Create a new task.')

@section('content')

<form action="{{ route('todolist.store') }}" method="POST">
   @csrf

   <h1 class="my-5">Add Todo</h1>

   @include('todo.partials.form')
   
   <input type="submit" name="submit" class="btn btn-primary" value="Submit">

</form>

@endsection