<h3>
   <a href="{{ route('departments.show', ['task' => $list->id]) }}" class="">{{ $list['title'] }}</a>
</h3>
<div class="mb-3">

   <a href="{{ route('departments.edit', ['task' => $list->id]) }}" class="btn btn-primary">Edit</a>

   <form action="{{ route('departments.destroy', ['task' => $list->id]) }}" class="d-inline" method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Delete!">
   </form>

</div>