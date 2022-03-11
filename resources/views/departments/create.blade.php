@extends('layouts.base')

@section('title', 'Create a new department.')

@section('content')

   <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <a href="{{ route('departments.index') }}" class='btn btn-secondary me-2'><i class="bi bi-chevron-left"></i>
         Go Back</a>
   </div>
   <div class="row">
      <div class="col">
         <form action="{{ route('departments.store') }}" method="POST" class='needs-validation' enctype="multipart/form-data">
            @csrf

            <h1 class="h2 mb-4">Create a Department</h1>
            
            @include('departments.partials.form')

            <input type="submit" name="submit" class="btn btn-success" value="Create">

         </form>

      </div>
   </div>

@endsection
