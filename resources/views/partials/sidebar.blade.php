      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Stok Bahan</li>
            <li class="{{ Request::routeIs('bahan') ? 'active' : '' }}">
              <a href="{{route('bahan')}}" class="nav-link"><i class="fas fa-columns"></i> <span>Tabel Bahan</span></a>
            </li>
            <li class="{{ Request::routeIs('stok') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('stok')}}"><i class="far fa-square"></i> <span>Stok Bahan</span></a>
            </li>
            <li class="{{ Request::routeIs('supplier') ? 'active' : '' }}">
              <a href="{{route('supplier')}}" class="nav-link"><i class="fas fa-th"></i> <span>Suplier</span></a>
            </li>
            <li class="{{ Request::routeIs('history') ? 'active' : '' }}">
              <a href="{{route('history')}}" class="nav-link"><i class="fas fa-th"></i> <span>Riwayat Stok</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::routeIs('kategori') ? 'active' : '' }}">
              <a href="{{route('kategori')}}" class="nav-link"><i class="fas fa-th-large"></i> <span>Kategori Menu</span></a>
            </li>
            <li class="{{ Request::routeIs('menu') ? 'active' : '' }}">
              <a href="{{route('menu')}}" class="nav-link"><i class="far fa-file-alt"></i> <span>Daftar Menu</span></a>
            </li>           
            <li class="menu-header">Keuangan</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Laporan Keuangan</span></a>
              <ul class="dropdown-menu">
                <li><a href="auth-forgot-password.html">Harian</a></li> 
                <li><a href="auth-login.html">Mingguan</a></li> 
                <li><a href="auth-register.html">Bulanan</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Pengeluaran</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">Bahan</a></li> 
                <li><a class="nav-link" href="errors-403.html">Gaji</a></li> 
                <li><a class="nav-link" href="errors-404.html">Operasional</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Laba Rugi</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="features-activities.html">Pemasukan</a></li>
                <li><a class="nav-link" href="features-post-create.html">Pengeluaran</a></li>
                <li><a class="nav-link" href="features-posts.html">Profit</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Arus Kas</span></a>
              <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Kas Masuk</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Kas Keluar</a></li>
              </ul>
            </li>            
            <li class="menu-header">Kasir</li>
            <li class="{{ Request::routeIs('kasir') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('kasir')}}"><i class="fas fa-pencil-ruler"></i> <span>Halaman Kasir</span></a>
            </li>
            <li class="menu-header">Logout</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Logout</span></a></li>
          </ul>
      
        </aside>
      </div>