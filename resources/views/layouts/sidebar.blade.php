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
      <a href="{{ route('admin-profile') }}" class="d-block">{{Auth::user()->name}}</a>
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
        <li class="nav-item has-treeview {{ Route::currentRouteName() == 'admin-Data-kategori-index' || Route::currentRouteName() == 'admin-Data-keuangan-index1' ? 'menu-open':'' }}">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin-Data-kategori-index' || Route::currentRouteName() == 'admin-Data-keuangan-index1' ? 'active':'' }}">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              Keuangan Sekolah
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="{{ route('admin-Data-kategori-index') }}" class="nav-link {{ Route::currentRouteName() == 'admin-Data-kategori-index' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{route('admin-Data-keuangan-index1')}}" class="nav-link {{ Route::currentRouteName() == 'admin-Data-keuangan-index1' ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Keuangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hutang & Piutang</p>
                <i class="fas fa-lock right"></i>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              Transaksi SPP
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi SPP</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{route('admin-Data-tagihan-index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kuitansi</p>
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
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Nama Kelas
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="/admin/nama_kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Nama Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/nama_kelas/daftar_nama_kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Nama Kelas</p>
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
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key fa-lock right"></i>
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