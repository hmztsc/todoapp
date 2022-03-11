@extends('layouts.base')

@section('title', 'Todo')

@section('content')

   <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <a href="{{ route('tasks.index') }}" class='btn btn-secondary me-2'><i class="bi bi-chevron-double-left"></i>
         Back</a>
      
      @can('update', $task)
      <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class='btn btn-primary me-2'><i
            class="bi bi-pencil-square"></i> Edit</a>
      @endcan

      @can('delete', $task)
      <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" class='btn btn-danger' data-bs-toggle="modal"
         data-bs-target="#deleteTaskModal"><i class="bi bi-trash"></i> Delete</a>
      @endcan
   </div>

   <div class="row">
      <div class="col">

         <h1 class="h2 mb-4">{{ $task->title }}</h1>

         <p class="description">{{ $task->description }}</p>

         <p>Status : {{ Str::headline($task->status) }}</p>
         <p>Priority : {{ Str::headline($task->priority) }}</p>

         <div class='my-3'>
            <span class="creator my-3">Created by : {{ $task->user->name }}</span> - <span class="created_at text-muted"
               data-bs-toggle="tooltip" data-bs-placement="top"
               title='{{ $task->created_at->format('d-m-Y H:i:s') }}'>{{ $task->created_at->diffForHumans() }}</span>
         </div>

         <div class="my-4"></div>

         <h5 class="border-botom mb-4">Comments</h5>

         <div id="comments">

            @forelse ( $task->comments as $comment )

               <div class="d-flex text-muted mb-3 border p-3 rounded">
                  <p class="mb-0 small lh-sm ">
                     <strong class="d-block mb-1">{{ $comment->user->name }}</strong>
                     {{ $comment->content }}
                  </p>

                  <small class="opacity-50 text-nowrap ms-auto ps-3">{{ $comment->created_at->diffForHumans() }}</small>
               </div>
                  
            @empty

            No comments yet.
               
            @endforelse

         </div>

         <h5 class="border-botom my-4">Write a comment.</h5>

         <form action="{{ route('comments.store') }}" method='POST' class='needs-validation'>
            @csrf
            @method('POST')
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <div class="mt-4 mb-3">
               <textarea type="text" name='content'
                  class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="content"></textarea>
               @if ($errors->has('content'))
                  <div class="invalid-feedback">{{ $errors->first('content') }}</div>
               @endif
            </div>
            <button type="submit" class="btn btn-success" id='todolist-store-submit'>Add Comment</button>
         </form>

      </div>
   </div>


   <div class="modal modal-alert fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form action='{{ route('tasks.destroy', ['task' => $task->id]) }}' method='POST'>
               @csrf
               @method('DELETE')

               <div class="modal-body p-4 text-center">
                  <h5 class="mb-0">Delete task?</h5>
                  <p class="mb-0">You can always change your mind in delete the task.</p>
               </div>

               <div class="modal-footer flex-nowrap p-0">
                  <button type="submit"
                     class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>Yes,
                        delete</strong></button>
                  <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0"
                     data-bs-dismiss="modal">No thanks</button>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection

@section('javascripts')

   <script type="text/javascript">

   </script>

@endsection
