@extends('layouts.base-login')

@section('title', 'Login')

@section('content')

   <form action="{{ route('login') }}" class='needs-validation' method="POST">
      @csrf
      <img class="mb-4" src="https://www.webtures.com/assets/images/icons/webtures-180.png" alt=""
         style='max-width:72px;'>
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating mb-3">
         <input type="email" name="email" id="email" value="{{ old('email') }}"
            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="name@example.com">
         <label for="email">Email address</label>
         @if ($errors->has('email'))
            <div class="invalid-feedback">
               <strong>{{ $errors->first('email') }}</strong>
            </div>
         @endif
      </div>

      <div class="form-floating mb-3">
         <input type="password" name="password" id="password" value="{{ old('password') }}"
            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password">
         <label for="password">Password</label>
         @if ($errors->has('password'))
            <span class="invalid-feedback">
               <strong>{{ $errors->first('password') }}</strong>
            </span>
         @endif
      </div>

      <div class="form-check form-switch d-flex justify-content-center mb-3">
         <input class="form-check-input me-2" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ old('remember') ? 'checked' : '' }}>
         <label class="form-check-label" for="flexSwitchCheckDefault">Remember me</label>
       </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

      <p class='mt-3'><small><a href="{{ route('register') }}" class='text-decoration-none text-muted'>Don't have an account?</a></small></p>

      <p class="mt-5 mb-3 text-muted">&copy; 2011–2022</p>
   </form>

@endsection
