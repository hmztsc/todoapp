@extends('layouts.base')

@section('title', 'TodoList')

@section('content')

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <h1 class="h2">Departments</h1>
      <a href="{{ route('departments.create') }}" class='btn btn-success ms-auto'><i class="bi bi-plus-circle"></i> Create
         a new department</a>
   </div>

   <div class="row" id='todolist'>

      @forelse ($departments as $department)

         <div class="col-lg-4 pb-5">
            <div>
               <h2 class="pb-3 h3">{{ $department->name }}</h2>
               <a href="{{ route('departments.show', ['department' => $department->id]) }}" class="btn btn-primary">
                  Show Tasks
               </a>
            </div>
         </div>
      @empty
         <div class="col">
            No departments.
         </div>
      @endforelse



   </div>

@endsection
