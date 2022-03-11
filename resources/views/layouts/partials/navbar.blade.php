<ul class="nav flex-column">

   <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.index') }}">
         <i class="bi bi-grid me-2"></i>
         Dashboard
      </a>
   </li>

   @if(Auth::User()->is_agent)
   <li class="nav-item">
      <a class="nav-link" href="{{ route('tasks.index') }}">
         <i class="bi bi-grid me-2"></i>
         Todo List
      </a>
   </li>
   @endif

   @if(Auth::User()->is_superadmin)
   <li class="nav-item">
      <a class="nav-link" href="{{ route('departments.index') }}">
         <i class="bi bi-grid me-2"></i>
         Departments
      </a>
   </li>
   @endif

   @if (Auth::User()->is_superadmin || Auth::User()->is_admin)
   <li class="nav-item">
      <a class="nav-link" href="{{ route('tasks.index') }}">
         <i class="bi bi-grid me-2"></i>
         Users
      </a>
   </li>
   @endif

</ul>
