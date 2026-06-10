<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/dist/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('stisla/dist/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name ?? '' }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Halmahera Caffe</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">HC</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
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
            <li class="menu-header">Keuangan</li>
            <li class="dropdown {{ Request::routeIs('harian', 'mingguan', 'bulanan') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i> <span>Laporan Keuangan</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('harian') ? 'active' : '' }}"><a href="{{route('harian')}}">Harian</a></li> 
                <li class="{{ Request::routeIs('mingguan') ? 'active' : '' }}"><a href="{{route('mingguan')}}">Mingguan</a></li> 
                <li class="{{ Request::routeIs('bulanan') ? 'active' : '' }}"><a href="{{route('bulanan')}}">Bulanan</a></li> 
              </ul>
            </li>
            <li class="dropdown {{ Request::routeIs('pengeluaran_bahan', 'pengeluaran_gaji', 'pengeluaran_operasional') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder-minus"></i> <span>Pengeluaran</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('pengeluaran_bahan') ? 'active' : '' }}"><a href="{{route('pengeluaran_bahan')}}">Bahan</a></li> 
                <li class="{{ Request::routeIs('pengeluaran_gaji') ? 'active' : '' }}"><a href="{{route('pengeluaran_gaji')}}">Gaji</a></li> 
                <li class="{{ Request::routeIs('pengeluaran_operasional') ? 'active' : '' }}"><a href="{{route('pengeluaran_operasional')}}">Operasional</a></li> 
              </ul>
            </li>         
            <li class="menu-header">Kasir</li>
            <li class="{{ Request::routeIs('kasir') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('kasir')}}"><i class="fas fa-store"></i> <span>Halaman Kasir</span></a>
            </li>
            <li class="menu-header">Logout</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
          </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                      <i class="far fa-user"></i>
                      </div>
                      <div class="card-wrap">
                      <div class="card-header">
                          <h4>Penjualan Hari Ini</h4>
                      </div>
                      <div class="card-body">
                          Rp {{ number_format($penjualanHariIni,0,',','.') }}
                      </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                      <div class="card-icon bg-danger">
                      <i class="far fa-newspaper"></i>
                      </div>
                      <div class="card-wrap">
                      <div class="card-header">
                          <h4>Transaksi Hari Ini</h4>
                      </div>
                      <div class="card-body">
                          {{ $transaksiHariIni }}
                      </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                      </div>
                      <div class="card-wrap">
                      <div class="card-header">
                          <h4>Menu Terlaris</h4>
                      </div>
                      <div class="card-body">
                          {{ $menuTerlaris?->menu?->nama_menu ?? '-' }}
                      </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                      <i class="fas fa-circle"></i>
                      </div>
                      <div class="card-wrap">
                      <div class="card-header">
                          <h4>Bahan Menipis</h4>
                      </div>
                      <div class="card-body">
                          {{ $bahanMenipis }}
                      </div>
                      </div>
                  </div>
                </div>                  
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>List Bahan Menipis</h4>
                      </div>
                      <div class="card-body p-0">
                        @if($listBahanMenipis->count())
                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Nama Bahan</th>
                                          <th>Stok Saat Ini</th>
                                          <th>Minimal Stok</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      @foreach($listBahanMenipis as $bahan)
                                      <tr>
                                          <td>{{ $bahan->nama_bahan }}</td>
                                          <td>
                                              {{ $bahan->jumlah_stok }}
                                              {{ $bahan->satuan }}
                                          </td>
                                          <td>
                                              {{ $bahan->minimal_stok }}
                                              {{ $bahan->satuan }}
                                          </td>
                                          <td>
                                              <span class="badge bg-danger text-white">
                                                  Menipis
                                              </span>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                        @else
                          <div class="alert alert-success mb-0">
                            Semua stok bahan aman.
                          </div>
                        @endif
                      </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Budget vs Sales</h4>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart" height="158"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                  <div class="card gradient-bottom">
                      <div class="card-header">
                          <h4>Top 5 Menu Terlaris</h4>
                      </div>

                      <div class="card-body" id="top-5-scroll">

                          <ul class="list-unstyled list-unstyled-border">

                              @foreach($topMenuTerlaris as $item)

                              <li class="media">

                                  @if($item->menu->foto)
                                      <img class="mr-3 rounded"
                                          width="55"
                                          src="{{ asset('storage/' . $item->menu->foto) }}"
                                          alt="{{ $item->menu->nama_menu }}">
                                  @else
                                      <img class="mr-3 rounded"
                                          width="55"
                                          src="{{ asset('stisla/dist/assets/img/products/product-3-50.png') }}"
                                          alt="{{ $item->menu->nama_menu }}">
                                  @endif

                                  <div class="media-body">

                                      <div class="float-right">
                                          <div class="font-weight-600 text-muted text-small">
                                              {{ $item->total_terjual }} Terjual
                                          </div>
                                      </div>

                                      <div class="media-title">
                                          {{ $item->menu->nama_menu }}
                                      </div>

                                      <div class="text-small text-muted">
                                          Rp {{ number_format($item->menu->harga, 0, ',', '.') }}
                                      </div>

                                  </div>

                              </li>

                              @endforeach

                          </ul>

                      </div>
                  </div>
                </div>
            </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('stisla/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('stisla/dist/assets/modules/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/dist/assets/js/page/index.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/dist/assets/js/custom.js')}}"></script>
</body>
</html>