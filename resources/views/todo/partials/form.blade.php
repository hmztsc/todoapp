<div class="card mb-3">
   <div class="card-body">

      <div class="mb-3">
         <label for="title">Title</label>
         <input type="text" name="title" id="title" class="form-control"
            value="{{ old('title', optional($list ?? null)->title) }}">
      </div>

      <div class="mb-3">
         <label for="description">Description</label>
         <input type="text" name="description" id="description" class="form-control"
            value="{{ old('description', optional($list ?? null)->description) }}">
      </div>
      
      <div class="mb-3">
         <label for="priority">Priority</label>
         <select name="priority" id="priority" class='form-control'>
            <option value="">Please select</option>

            @foreach(['low', 'medium', 'high'] as $value)
            <option @selected(old('priority', optional($list ?? null)->priority) == $value) >{{ $value }}</option>
            @endforeach

         </select>
      </div>

      <div class="mb-3">
         <label for="amount">amount</label>
         <input type="text" name="amount" id="amount" class="form-control"
            value="{{ old('amount', optional($list ?? null)->amount) }}">
      </div>

      @if ($errors->any())
         <div class="mb-3">
            <ul class="list-group">
               @foreach ($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

   </div>
</div>
