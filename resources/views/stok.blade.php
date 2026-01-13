@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Stok Bahan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Stok Bahan</h2>
            <p class="section-lead">Menampilkan nama bahan dan ketersediaan stok.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Stok Bahan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Minimal Stok</th>
                            <th>Jumlah Stok</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Bubuk kopi</td>
                            <td>Gram</td>
                            <td>20</td>
                            <td>200</td>
                            <td>
                              <a href="#" class="btn btn-info">Tambah Stok</a>
                              <a href="#" class="btn btn-primary">Pengurangan Stok</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Gula</td>
                            <td>Gram</td>
                            <td>100</td>
                            <td>500</td>
                            <td>
                              <a href="#" class="btn btn-info">Tambah Stok</a>
                              <a href="#" class="btn btn-primary">Pengurangan Stok</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Jahe</td>
                            <td>Ons</td>
                            <td>50</td>
                            <td>120</td>
                            <td>
                              <a href="#" class="btn btn-info">Tambah Stok</a>
                              <a href="#" class="btn btn-primary">Pengurangan Stok</a>
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
