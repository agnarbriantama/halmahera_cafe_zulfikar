@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Nama Bahan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Nama Bahan</h2>
            <p class="section-lead">Menampilkan nama bahan.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Bahan</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <a href="" class="btn btn-success">Tambah Nama Bahan</a>
                    </div>
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
                            <td>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Gula</td>
                            <td>Gram</td>
                            <td>50</td>
                            <td>
                              <a href="#" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Jahe</td>
                            <td>Ons</td>
                            <td>100</td>
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
