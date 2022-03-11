@extends('layouts.base')

@section('title', 'Create a new task.')

@section('content')

   <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class='btn btn-secondary me-2'><i class="bi bi-chevron-left"></i>
         Go Back</a>
   </div>
   <div class="row">
      <div class="col">
         <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class='needs-validation' enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h1 class="h2 mb-4">Update the Task</h1>
            
            @include('tasks.partials.form')

            <input type="submit" name="submit" class="btn btn-primary" value="Update">

         </form>

      </div>
   </div>

@endsection
