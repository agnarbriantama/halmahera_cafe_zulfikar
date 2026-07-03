      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Halmahera Cafe</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">HC</a>
          </div>
          <ul class="sidebar-menu">
            @if(in_array(auth()->user()->role, ['owner', 'admin', 'superadmin']))
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @endif
            @if(in_array(auth()->user()->role, ['admin', 'superadmin']))
            <li class="menu-header">Stok Bahan</li>
            <li class="{{ Request::routeIs('bahan') ? 'active' : '' }}">
              <a href="{{route('bahan')}}" class="nav-link"><i class="fas fa-warehouse"></i> <span>Tabel Bahan</span></a>
            </li>
            <li class="{{ Request::routeIs('stok') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('stok')}}"><i class="fas fa-box"></i> <span>Stok Bahan</span></a>
            </li>
            <li class="{{ Request::routeIs('supplier') ? 'active' : '' }}">
              <a href="{{route('supplier')}}" class="nav-link"><i class="fas fa-comments"></i> <span>Suplier</span></a>
            </li>
            <li class="{{ Request::routeIs('history') ? 'active' : '' }}">
              <a href="{{route('history')}}" class="nav-link"><i class="fas fa-clock"></i> <span>Riwayat Stok</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::routeIs('kategori') ? 'active' : '' }}">
              <a href="{{route('kategori')}}" class="nav-link"><i class="fas fa-th-large"></i> <span>Kategori Menu</span></a>
            </li>
            <li class="{{ Request::routeIs('menu') ? 'active' : '' }}">
              <a href="{{route('menu')}}" class="nav-link"><i class="fas fa-utensils"></i> <span>Daftar Menu</span></a>
            </li>
            @endif
            @if(in_array(auth()->user()->role, ['owner', 'admin', 'superadmin']))           
            <li class="menu-header">Keuangan</li>
            <li class="dropdown {{ Request::routeIs('harian', 'mingguan', 'bulanan') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i> <span>Laporan Keuangan</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('harian') ? 'active' : '' }}"><a href="{{route('harian')}}">Harian</a></li> 
                <li class="{{ Request::routeIs('mingguan') ? 'active' : '' }}"><a href="{{route('mingguan')}}">Mingguan</a></li> 
                <li class="{{ Request::routeIs('bulanan') ? 'active' : '' }}"><a href="{{route('bulanan')}}">Bulanan</a></li> 
              </ul>
            </li>
            @endif
            @if(in_array(auth()->user()->role, ['admin', 'superadmin']))
            <li class="dropdown {{ Request::routeIs('pengeluaran_bahan', 'pengeluaran_gaji', 'pengeluaran_operasional') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder-minus"></i> <span>Pengeluaran</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('pengeluaran_bahan') ? 'active' : '' }}"><a href="{{route('pengeluaran_bahan')}}">Bahan</a></li> 
                <li class="{{ Request::routeIs('pengeluaran_gaji') ? 'active' : '' }}"><a href="{{route('pengeluaran_gaji')}}">Gaji</a></li> 
                <li class="{{ Request::routeIs('pengeluaran_operasional') ? 'active' : '' }}"><a href="{{route('pengeluaran_operasional')}}">Operasional</a></li> 
              </ul>
            </li>
            <!-- <li class="{{ Request::routeIs('laba_rugi') ? 'active' : '' }}">
              <a href="{{route('laba_rugi')}}" class="nav-link"><i class="far fa-file-alt"></i> <span>Laba Rugi</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Arus Kas</span></a>
              <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Kas Masuk</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Kas Keluar</a></li>
              </ul>
            </li>             -->
            <li class="menu-header">Kasir</li>
            <li class="{{ Request::routeIs('kasir') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('kasir')}}"><i class="fas fa-store"></i> <span>Halaman Kasir</span></a>
            </li>
            @endif
            @if(in_array(auth()->user()->role, ['superadmin']))
            <li class="menu-header">User</li>
            <li><a class="nav-link" href="{{route('register')}}"><i class="fas fa-sign-out-alt"></i> <span>Register</span></a></li>
            @endif

            <li class="menu-header">Logout</li>
            <li><a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
          </ul>
      
        </aside>
      </div>