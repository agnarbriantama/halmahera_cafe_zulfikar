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
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahKategori">Tambah</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Action</th>
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
                              <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editKategori">Edit</a>
                              <a href="#" type="button" class="btn btn-danger" id="hapus-kategori">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahKategori">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama kategori tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="number" class="form-control" required="">
                      <div class="invalid-feedback">
                        Keterangan tidak boleh kosong
                      </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editKategori">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Edit Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama kategori tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="number" class="form-control" required="">
                      <div class="invalid-feedback">
                        Keterangan tidak boleh kosong
                      </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
