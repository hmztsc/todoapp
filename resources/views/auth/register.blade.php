@extends('layouts.base-login')

@section('title', 'Login')

@section('content')

   <form action="{{ route('register') }}" class='needs-validation' method="POST">
      @csrf
      <img class="mb-4" src="https://www.webtures.com/assets/images/icons/webtures-180.png" alt=""
         style='max-width:72px;'>
      <h1 class="h3 mb-3 fw-normal">Register</h1>

      <div class="form-floating mb-3">
         <input type="text" name="name" id="name" value="{{ old('name') }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name">
         <label for="name">Name</label>
         @if ($errors->has('name'))
            <div class="invalid-feedback">
               <strong>{{ $errors->first('name') }}</strong>
            </div>
         @endif
      </div>

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

      <div class="form-floating mb-3">
         <input type="password" name="password_confirmation" id="password_confirmation"
            value="{{ old('password_confirmation') }}"
            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
            placeholder="Password Confirm">
         <label for="password_confirmation">Password Confirm</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

      <p class='mt-3'><small><a href="{{ route('login') }}" class='text-decoration-none text-muted'>Already have an
               account?</a></small></p>

      <p class="mt-5 mb-3 text-muted">&copy; 2011–2022</p>
   </form>

@endsection
