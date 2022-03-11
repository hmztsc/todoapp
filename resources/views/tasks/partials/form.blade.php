<div class="card mb-3">
   <div class="card-body">

      @if(session('status-danger'))
      <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
         <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
         <span class="message">{{ session('status-danger') }}</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
         style='bottom:0; height:auto;'></button>
      </div>
      @endif

      <div class="mb-3">
         <label for="title" class="form-label">Title:</label>
         <input type="text" name='title' class="form-control {{ $errors->has('title') ? 'is-invalid': '' }}" id="title"  value="{{ old('title', optional($task ?? null)->title) }}">
         @if($errors->has('title'))
         <div class="invalid-feedback">{{ $errors->first('title') }}</div>
         @endif
      </div>
      <div class="mb-3">
         <label for="description" class="form-label">Description:</label>
         <textarea name='description' class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" id="description" >{{ old('description', optional($task ?? null)->description) }}</textarea>
         @if($errors->has('description'))
         <div class="invalid-feedback">{{ $errors->first('description') }}</div>
         @endif
      </div>
      <div class="mb-3">
         <label for="status" class="form-label">Status:</label>
         <select id='status' name='status' class='form-select {{ $errors->has('status') ? 'is-invalid' : '' }}'>
            <option value="">Please Select</option>

            @foreach(['open', 'in_progress', 'done'] as $value)
            <option value="{{ $value }}" @selected(old('status', optional($task ?? null)->status) == $value) >{{ Str::headline($value) }}</option>
            @endforeach
         </select>
         @if($errors->has('status'))
         <div class="invalid-feedback">{{ $errors->first('status') }}</div>
         @endif
      </div>
      <div class="mb-3">
         <label for="priority" class="form-label">Priority:</label>
         <select id='priority' name='priority' class='form-select {{ $errors->has('priority') ? 'is-invalid' : '' }}'>
            <option value="">Please Select</option>
            @foreach(['low', 'medium', 'high'] as $value)
            <option value="{{ $value }}" @selected(old('priority', optional($task ?? null)->priority) == $value) >{{ Str::headline($value) }}</option>
            @endforeach
         </select>
         @if($errors->has('priority'))
         <div class="invalid-feedback">{{ $errors->first('priority') }}</div>
         @endif
      </div>

   </div>
</div>


