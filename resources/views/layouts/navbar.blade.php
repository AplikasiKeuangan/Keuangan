<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
   </ul>

  

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!--Power Menu -->
      <li class="nav-item dropdown">
         <a class="nav-link logout-confirm" href="{{ route('logout') }}" onclick="event.preventDefault();">
            <i class="fas fa-power-off"></i>
            <span class="badge badge-danger navbar-badge"></span>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
         </form>
      </li>
   </ul>
</nav>
<!-- /.navbar -->