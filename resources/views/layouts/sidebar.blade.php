<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset ('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
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
        <li class="nav-header">Keuangan</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              Keuangan Sekolah
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penerimaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengeluaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hutang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-topnav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Navbar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-footer.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Piutang</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin-kas-tunai-index' || Route::currentRouteName() == 'admin-kas-bank-index' ? 'menu-open':'' }}">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin-kas-tunai-index' || Route::currentRouteName() == 'admin-kas-bank-index' ? 'active':'' }}">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
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
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Jurusan
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="/admin/jurusan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Jurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/jurusan/daftar_jurusan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Jurusan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Kelas
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="/admin/kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kelas/daftar_kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Kelas</p>
              </a>
            </li>
          </ul>
        </li>
        
     
       
        
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>