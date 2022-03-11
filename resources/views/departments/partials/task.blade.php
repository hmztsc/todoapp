<a href="{{ route('tasks.show', $task->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"
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

</a>