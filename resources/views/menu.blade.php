@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Menu</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Daftar Menu</h2>
            <p class="section-lead">Menampilkan daftar menu.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Menu</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <a href="" class="btn btn-success">Tambah Menu</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Beauty hanny coffe</td>
                            <td>Rp. 20.000</td>
                            <td>Hot Coffe</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail Resep</a>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Es Lemon Tea</td>
                            <td>Rp. 15.000</td>
                            <td>Es Fruit</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail Resep</a>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Es Oreo Coffea</td>
                            <td>Rp. 25.000</td>
                            <td>Es Coffea</td>
                            <td>
                              <a href="#" class="btn btn-primary">Detail Resep</a>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
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
