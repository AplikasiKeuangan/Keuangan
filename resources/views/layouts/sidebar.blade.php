<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('welcome') }}" class="brand-link">
    <img src="{{ asset ('template/dist/img/logo1.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">An-Nahl </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset ('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active':'' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        @if (Auth::user()->id == 1)
        <li class="nav-header"> Admin</li>
        <li class="nav-item has-treeview">
          <a href="{{route('admin-Data-users-index')}}" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
             Tambah Pengguna
            </p>
          </a>
        </li>
        @endif

        <li class="nav-header">Keuangan</li>
        <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin-piutang-tagihan-index' ||  Route::currentRouteName() == 'admin-piutang-transaksi-index' ? 'menu-open':'' }}">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin-piutang-tagihan-index' ||  Route::currentRouteName() == 'admin-piutang-transaksi-index' ? 'active':'' }}">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              Piutang Siswa
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="{{route('admin-piutang-transaksi-index')}}" class="nav-link {{ Route::currentRouteName() == 'admin-piutang-transaksi-index' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{route('admin-piutang-tagihan-index')}}" class="nav-link {{ Route::currentRouteName() == 'admin-piutang-tagihan-index' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tagihan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin-kas-tunai-index' || Route::currentRouteName() == 'admin-kas-bank-index' || Route::currentRouteName() == 'admin-kas-index' ? 'menu-open':'' }}">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin-kas-tunai-index' || Route::currentRouteName() == 'admin-kas-bank-index' || Route::currentRouteName() == 'admin-kas-index' ? 'active':'' }}">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p onclick="location.href='{{ route('admin-kas-index') }}'">
              Kas
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin-kas-bank-index') }}" class="nav-link {{ Route::currentRouteName() == 'admin-kas-bank-index' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kas Bank</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin-kas-tunai-index') }}" class="nav-link {{ Route::currentRouteName() == 'admin-kas-tunai-index' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kas Tunai</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header"> Akademik</li>
        <li class="nav-item">
          <a href="{{ route('admin-siswa-index') }}" class="nav-link {{ Route::currentRouteName() == 'admin-siswa-index' ? 'active':'' }}">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Kesiswaan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin-tahun-ajaran-index')}}" class="nav-link {{ Route::currentRouteName() == 'admin-tahun-ajaran-index' ? 'active':'' }}">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Tahun Ajaran | Kelas
            </p>
          </a>
        </li>
        <li class="nav-header"> Setting</li>
        <li class="nav-item has-treeview">
          <a href="{{route('password-update')}}" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Password Recovery
            </p>
          </a>
        </li>
     
       
        
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>