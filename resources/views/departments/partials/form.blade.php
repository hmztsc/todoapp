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
         <label for="name" class="form-label">Name:</label>
         <input type="text" name='name' class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}" id="name"  value="{{ old('name', optional($department ?? null)->name) }}">
         @if($errors->has('name'))
         <div class="invalid-feedback">{{ $errors->first('name') }}</div>
         @endif
      </div>
   </div>
</div>


