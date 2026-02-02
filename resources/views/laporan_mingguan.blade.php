@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Laporan Mingguan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Mingguan</h2>
            <p class="section-lead">Menampilkan aktifitas keuangan berdasarkan minggu.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Laporan Mingguan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Tanggal</th>
                            <th>Income</th>
                            <th>Expence</th>
                            <th>Laba Rugi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>11-01-2026 - 17-01-2026</td>
                            <td>Rp. 2.000.000</td>
                            <td>Rp. 500.000</td>
                            <td>Rp. 1.500.000</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>18-01-2026 - 24-01-2026</td>
                            <td>Rp. 1.500.000</td>
                            <td>Rp. 700.000</td>
                            <td>Rp. 800.000</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>25-01-2026 - 31-01-2026</td>
                            <td>Rp. 2.500.000</td>
                            <td>Rp. 1.300.000</td>
                            <td>Rp. 1.200.000</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
