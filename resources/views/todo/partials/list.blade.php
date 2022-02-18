<h3>
   <a href="{{ route('todo.show', ['todo' => $list->id]) }}" class="">{{ $list['title'] }}</a>
</h3>
<div class="mb-3">

   <a href="{{ route('todo.edit', ['todo' => $list->id]) }}" class="btn btn-primary">Edit</a>

   <form action="{{ route('todo.destroy',['todo' => $list->id]) }}" class="d-inline" method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Delete!">
   </form>

</div>