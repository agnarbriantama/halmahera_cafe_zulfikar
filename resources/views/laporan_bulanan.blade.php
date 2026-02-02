@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Laporan Bulanan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Bulanan</h2>
            <p class="section-lead">Menampilkan aktifitas keuangan berdasarkan bulan.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Laporan Bulanan</h4>
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
                            <td>01-2026</td>
                            <td>Rp. 30.000.000</td>
                            <td>Rp. 20.000.000</td>
                            <td>Rp. 10.000.000</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>02-2026</td>
                            <td>Rp. 60.000.000</td>
                            <td>Rp. 40.000.000</td>
                            <td>Rp. 20.000.000</td>
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
