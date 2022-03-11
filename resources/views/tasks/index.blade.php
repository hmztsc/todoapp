@extends('layouts.base')

@section('title', 'TodoList')

@section('content')

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <h1 class="h2">Todo List</h1>
      <a href="{{ route('tasks.create') }}" class='btn btn-success ms-auto'><i class="bi bi-plus-circle"></i> Create a new task</a>
   </div>

   <div class="row" id='todolist'>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">Open</h2>
         <div class="list-group" id='open_tasks'>

            @forelse ($open as $task)
               @include('tasks.partials.task')
            @empty
               No open tasks.
            @endforelse

         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">In Progress</h2>
         <div class="list-group" id='in_progress_tasks'>

            @forelse ($in_progress as $task)
               @include('tasks.partials.task')
            @empty
               No in progress tasks.
            @endforelse
         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">Done</h2>
         <div class="list-group" id='done_tasks'>

            @forelse ($done as $task)
               @include('tasks.partials.task')
            @empty
               No done tasks.
            @endforelse
         </div>
      </div>
   </div>

@endsection