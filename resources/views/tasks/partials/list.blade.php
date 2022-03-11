<h3>
   <a href="{{ route('tasks.show', ['task' => $list->id]) }}" class="">{{ $list['title'] }}</a>
</h3>
<div class="mb-3">

   <a href="{{ route('tasks.edit', ['task' => $list->id]) }}" class="btn btn-primary">Edit</a>

   <form action="{{ route('tasks.destroy', ['task' => $list->id]) }}" class="d-inline" method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Delete!">
   </form>

</div>