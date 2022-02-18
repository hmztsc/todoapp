@extends('layouts.base')

@section('title', 'Todo')

@section('content')

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
      <h1 class="h2">Todo List</h1>
      <a href="#" class='btn btn-primary ms-auto' data-bs-toggle="modal" data-bs-target="#createModal">Create a new
         task</a>
   </div>

   <div class="row" id='todolist'>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">Open</h2>
         <div class="list-group" id='open_tasks'>

            @forelse ($open as $task)
               <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"
                  data-id='{{ $task->id }}'>
                  <div>
                     @if ($task->priority == 'low')
                        <i class="bi fs-1 bi-thermometer-low text-secondary" data-bs-toggle="tooltip"
                           data-bs-placement="top" title='Priority: Low'></i>
                     @elseif($task->priority == 'medium')
                        <i class="bi fs-1 bi-thermometer-half text-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: Medium'></i>
                     @else
                        <i class="bi fs-1 bi-thermometer-high text-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: High'></i>
                     @endif
                  </div>
                  <div class="d-flex gap-2 w-100 justify-content-between">
                     <div>
                        <h6 class="mb-0">{{ Str::limit($task->title, 40, '...') }}</h6>
                        <p class="mb-0 opacity-75">{{ Str::limit($task->description, 40, '...') }}</p>

                        <small class='text-muted'>Creator: {{ $task->user->name }}</small>
                     </div>
                     <small class="opacity-50 text-nowrap" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $task->created_at->format('d-m-y H:i:s') }}">{{ $task->created_at->diffForHumans() }}</small>
                  </div>
                  <div class="transactions ms-auto">
                     <i class='bi bi-trash3 text-danger delete' data-bs-toggle="modal"
                        data-bs-target="#deleteTaskModal"></i>
                  </div>

               </a>
            @empty

               No open tasks.
            @endforelse

         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">In Progress</h2>
         <div class="list-group" id='in_progress_tasks'>

            @forelse ($in_progress as $task)
               <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"
                  data-id='{{ $task->id }}'>
                  <div>
                     @if ($task->priority == 'low')
                        <i class="bi fs-1 bi-thermometer-low text-secondary" data-bs-toggle="tooltip"
                           data-bs-placement="top" title='Priority: Low'></i>
                     @elseif($task->priority == 'medium')
                        <i class="bi fs-1 bi-thermometer-half text-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: Medium'></i>
                     @else
                        <i class="bi fs-1 bi-thermometer-high text-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: High'></i>
                     @endif
                  </div>
                  <div class="d-flex gap-2 w-100 justify-content-between">
                     <div>
                        <h6 class="mb-0">{{ Str::limit($task->title, 40, '...') }}</h6>
                        <p class="mb-0 opacity-75">{{ Str::limit($task->description, 40, '...') }}</p>

                        <small class='text-muted'>Creator: {{ $task->user->name }}</small>
                     </div>
                     <small class="opacity-50 text-nowrap" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $task->created_at->format('d-m-y H:i:s') }}">{{ $task->created_at->diffForHumans() }}</small>
                  </div>
                  <div class="transactions ms-auto">
                     <i class='bi bi-trash3 text-danger delete' data-bs-toggle="modal"
                        data-bs-target="#deleteTaskModal"></i>
                  </div>

               </a>
            @empty

               No in progress tasks.
            @endforelse
         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <h2 class="pb-3 h3">Done</h2>
         <div class="list-group" id='done_tasks'>

            @forelse ($done as $task)
               <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"
                  data-id='{{ $task->id }}'>
                  <div>
                     @if ($task->priority == 'low')
                        <i class="bi fs-1 bi-thermometer-low text-secondary" data-bs-toggle="tooltip"
                           data-bs-placement="top" title='Priority: Low'></i>
                     @elseif($task->priority == 'medium')
                        <i class="bi fs-1 bi-thermometer-half text-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: Medium'></i>
                     @else
                        <i class="bi fs-1 bi-thermometer-high text-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                           title='Priority: High'></i>
                     @endif
                  </div>
                  <div class="d-flex gap-2 w-100 justify-content-between">
                     <div>
                        <h6 class="mb-0">{{ Str::limit($task->title, 40, '...') }}</h6>
                        <p class="mb-0 opacity-75">{{ Str::limit($task->description, 40, '...') }}</p>

                        <small class='text-muted'>Creator: {{ $task->user->name }}</small>
                     </div>
                     <small class="opacity-50 text-nowrap" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $task->created_at->format('d-m-y H:i:s') }}">{{ $task->created_at->diffForHumans() }}</small>
                  </div>
                  <div class="transactions ms-auto">
                     <i class='bi bi-trash3 text-danger delete' data-bs-toggle="modal"
                        data-bs-target="#deleteTaskModal"></i>
                  </div>

               </a>
            @empty

               No done tasks.
            @endforelse
         </div>
      </div>
   </div>

   <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form action='{{ route('todolist.store') }}' method='POST' id='todolist-store-form'
               class='needs-validation'>
               <div class="modal-header">
                  <h5 class="modal-title" id="createModalLabel">New Task</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  @csrf
                  @method('POST')
                  <div class="alert alert-dismissible fade show d-flex align-items-center d-none" role="alert">
                     <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                     <span class="message">You should check in on some of those fields below.</span>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style='bottom:0; height:auto;'></button>
                  </div>
                  <div class="mb-3">
                     <label for="title" class="form-label">Title:</label>
                     <input type="text" name='title' class="form-control" id="title" required>
                     <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3">
                     <label for="description" class="form-label">Description:</label>
                     <textarea name='description' class="form-control" id="description" required></textarea>
                     <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3">
                     <label for="status" class="form-label">Status:</label>
                     <select id='status' name='status' class='form-select' required>
                        <option value="">Please Select</option>
                        <option value="open">Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="done">Done</option>
                     </select>
                     <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3">
                     <label for="priority" class="form-label">Priority:</label>
                     <select id='priority' name='priority' class='form-select' required>
                        <option value="">Please Select</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                     </select>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" id='todolist-store-submit'>Create</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <div class="modal fade" id="readTaskModal" tabindex="-1" aria-labelledby="readTaskModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="readTaskModalLabel">New Task</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <div class="description"></div>

               <div class='my-3'>
                  <span class="creator my-3"></span> - <span class="created_at text-muted" data-bs-toggle="tooltip"
                  data-bs-placement="top" title=''></span>
               </div>

               <div class="my-4"></div>

               <form action="" method='POST'>

                  @csrf
                  @method('POST')



                  <h5 class="border-botom mb-4">Comments</h5>

                  <div id="comments">
                     <div class="d-flex text-muted mb-3 border p-3 rounded">
                        <p class="mb-0 small lh-sm ">
                           <strong class="d-block mb-1">Hamza Tasci</strong>
                           Some representative placeholder content, with some information about this user. Imagine this
                           being
                           some sort of status update, perhaps?
                        </p>

                        <small class="opacity-50 text-nowrap ms-auto ps-3">5 days ago</small>
                     </div>
                     <div class="d-flex text-muted mb-3 border p-3 rounded">
                        <p class="mb-0 small lh-sm ">
                           <strong class="d-block mb-1">Hamza Tasci</strong>
                           Some representative placeholder content, with some information about this user. Imagine this
                           being
                           some sort of status update, perhaps?
                        </p>

                        <small class="opacity-50 text-nowrap ms-auto ps-3">5 days ago</small>
                     </div>
                  </div>


                  <h5 class="border-botom my-4">Write a comment.</h5>

                  <div class="mt-4 mb-3">
                     <textarea type="text" name='comment' class="form-control" id="comment" required></textarea>
                     <div class="invalid-feedback"></div>
                  </div>

                  <button type="submit" class="btn btn-success" id='todolist-store-submit'>Add Comment</button>
               </form>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success" id='todolist-store-submit'>Edit</button>
            </div>
         </div>
      </div>
   </div>

   <div class="modal modal-alert fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form action='' method='DELETE'>
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
