<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>@yield('title') - {{ config('app.name') }} </title>

   <!-- Styles -->
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">

   @yield('styles')
</head>

<body>

   <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 d-flex align-items-center" href="{{ url('/') }}">

         <img src="https://www.webtures.com/assets/images/icons/webtures-180.png" class='me-2' width='28'
            alt="Webtures">

         <div class="d-flex align-items-center">
            <span style="color: #fff;">W</span>
            <span style="color: #fff;">E</span>
            <span style="color: #fff;">B</span>
            <span style="color: #fff;">T</span>
            <span style="color: #fff;">U</span>
            <span style="color: #fff;">R</span>
            <span style="color: #fff;">E</span>
            <span style="color: #fff;">S</span>
         </div>
      </a>
      <div class='d-flex px-3'>

         Department : {{ Auth::User()->department_id }}
         <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
               data-bs-toggle="dropdown" aria-expanded="false">
               <i class="bi bi-person"></i> {{ Auth::User()->name }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
               <li><a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="bi bi-door-closed"></i>
                     Sign out</a></li>
            </ul>
         </div>
         <button class="navbar-toggler ms-2 d-md-none collapsed " type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
      </div>

   </header>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf </form>

   <div class="container-fluid">


      <div class="row">
         <nav id="sidebarMenu" class="col-md-3 col-lg-2 pt-0 pt-lg-5 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-lg-5">

               @include('layouts.partials.navbar')


            </div>
         </nav>

         <main class="col-md-9 ms-sm-auto col-lg-10 py-md-3 px-md-5">

            @if(session('status'))
            <div class="alert alert-success d-flex align-items-center fade show" role="alert">
               <i class="bi bi-check fs-2 lh-sm"></i>

               <span>{{ session('status') }}</span>
               <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @yield('content')

         </main>
      </div>
   </div>

   <!-- Scripts -->
   <script src="{{ mix('js/app.js') }}"></script>

   @yield('javascripts')


</body>

</html>
