@extends('layouts.base')

@section('title','Update')

@section('content')

<h1 class="my-5">Update Todo :</h1>

<form action="{{ route('todo.update', ['todo' => $list->id]) }}" method="POST">
   @csrf
   @method('PUT')
   @include('todo.partials.form')
   
   <input type="submit" name="submit" class="btn btn-primary" value="Update">

</form>

@endsection