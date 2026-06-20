<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Neo Haru - Halaman Riwayat Pesan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('electro/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('electro/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('electro/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('electro/css/style.css')}}" rel="stylesheet">
    <style>
    /* 🔥 container scroll biar enak */
    .custom-table {
        padding: 10px;
        border-radius: 8px;
    }

    /* 🔥 table lebih lega */
    .custom-table table {
        border-spacing: 0 8px; /* jarak antar baris */
    }

    /* 🔥 row biar gak dempet */
    .custom-table td,
    .custom-table th {
        padding: 12px 10px;   /* ini kunci utama */
        vertical-align: middle;
    }

    /* 🔥 efek hover biar keren */
    .custom-table tbody tr {
        transition: 0.2s;
    }

    .custom-table tbody tr:hover {
        background: #f5f5f5;
    }

    /* 🔥 header lebih rapi */
    .custom-table thead th {
        padding: 14px 10px;
        background: #f8f9fa;
        position: sticky;
        top: 0;
        z-index: 1;
    }
    .custom-table {
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .pagination a {
        padding: 6px 12px;
        margin: 0 3px;
        border: 1px solid #ddd;
        text-decoration: none;
    }

    .pagination a.active {
        color: white;
    }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Accessories</a>
                                        <span>(3)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Electronics & Computer</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Laptops & Desktops</a>
                                        <span>(2)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Mobiles & Tablets</a>
                                        <span>(8)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">SmartPhone & Smart TV</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i
                                class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{route('kasir')}}" class="nav-item nav-link">Menu</a>
                            <a href="{{route('riwayat')}}" class="nav-item nav-link active">Riwayat Pesanan</a>
                            @if(in_array(auth()->user()->role, ['admin']))
                            <a href="{{route('dashboard')}}" class="nav-item nav-link">Dashboard</a>
                            @endif
                            <div class="nav-item dropdown d-block d-lg-none mb-3">
                                <a href="#" class="nav-link" data-bs-toggle="dropdown"><span class="dropdown-toggle">All
                                        Category</span></a>
                                <div class="dropdown-menu m-0">
                                    <ul class="list-unstyled categories-bars">
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Accessories</a>
                                                <span>(3)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Electronics & Computer</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Laptops & Desktops</a>
                                                <span>(2)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Mobiles & Tablets</a>
                                                <span>(8)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">SmartPhone & Smart TV</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('logout')}}" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                class="fa fa-mobile-alt me-2"></i> Logout</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Riwayat Pesanan</h1>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive custom-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Kasir</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($transaksi->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endif
                        @foreach($transaksi as $item)
                            <tr>
                                <th scope="row">
                                    <p class="mb-0 py-4"> {{ $item->kode_transaksi }}</p>
                                </th>
                                <td>
                                    <p class="mb-0 py-4">{{ $item->created_at->format('d-m-Y H:i') }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 py-4"> {{ $item->nama_customer }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 py-4">{{ $item->user->name ?? '-' }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 py-4">{{ $item->metode_pembayaran }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 py-4">Rp {{ number_format($item->grand_total, 0, ',', '.') }}</p>
                                </td>
                                <td class="py-4">
                                    <!-- <a href="{{ route('transaksi.detail', $item->id) }}" class="btn btn-info rounded-pill text-white">
                                        Detail
                                    </a> -->
                                    <button class="btn btn-info rounded-pill text-white btn-detail"
                                        data-id="{{ $item->id }}">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="pagination d-flex justify-content-center mt-5">

                        {{-- Previous --}}
                        @if ($transaksi->onFirstPage())
                            <a class="rounded disabled">&laquo;</a>
                        @else
                            <a href="{{ $transaksi->previousPageUrl() }}" class="rounded">&laquo;</a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                            class="rounded {{ $page == $transaksi->currentPage() ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        {{-- Next --}}
                        @if ($transaksi->hasMorePages())
                            <a href="{{ $transaksi->nextPageUrl() }}" class="rounded">&raquo;</a>
                        @else
                            <a class="rounded disabled">&raquo;</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-4 rounded mb-5" style="background: rgba(255, 255, 255, .03);">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Address</h4>
                            <p class="mb-2">123 Street New York.USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Mail Us</h4>
                            <p class="mb-2">info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Telephone</h4>
                            <p class="mb-2">(+012) 3456 7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Yoursite@ex.com</h4>
                            <p class="mb-2">(+012) 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <div class="footer-item">
                            <h4 class="text-primary mb-4">Newsletter</h4>
                            <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            <div class="position-relative mx-auto rounded-pill">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Enter your email">
                                <button type="button"
                                    class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Customer Service</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Returns</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Site Map</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Testimonials</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> My Account</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Unsubscribe Notification</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Information</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> About Us</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Delivery infomation</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Warranty</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> FAQ</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Seller Login</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Extras</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Brands</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Gift Vouchers</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Affiliates</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Wishlist</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">

                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>.
                    Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="modal-content">
                <!-- isi AJAX -->
            </div>

            </div>
        </div>
    </div>

    <!-- 🔥 PRINT IFRAME (HIDDEN) -->
    <!-- <iframe id="printFrame" style="display:none;"></iframe> -->
    <iframe id="printFrame" style="position:absolute; width:0; height:0; border:0;"></iframe>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('electro/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('electro/lib/owlcarousel/owl.carousel.min.js')}}"></script>


    <!-- Template Javascript -->
    <script src="{{asset('electro/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.btn-detail', function () {

            let id = $(this).data('id');

            $.get('/transaksi/' + id + '/ajax-detail', function (res) {

                $('#modal-content').html(res);

                $('#modalDetail').modal('show');

            });

        });

        $(document).on('click', '#btn-print', function () {

            let id = $(this).data('id');

            let iframe = document.getElementById('printFrame');
            iframe.src = `/transaksi/${id}/print`;

        });
    </script>
    
</body>

</html>