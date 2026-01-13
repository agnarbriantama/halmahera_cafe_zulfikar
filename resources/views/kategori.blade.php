@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Kategori Menu</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nama Kategori Menu</h2>
            <p class="section-lead">Menampilkan nama kategori-kategori menu.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Kategori</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <a href="" class="btn btn-success">Tambah Nama Kategori</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Kategori</th>
                            <th>Satuan</th>
                            <th>Ketarangan</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Ice Drink</td>
                            <td>Untuk minuman dingin</td>
                            <td>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Hot Coffea</td>
                            <td>untuk jenis minuman kopi panas</td>
                            <td>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Ice Fruit</td>
                            <td>untuk minuman buah buahan</td>
                            <td>
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
