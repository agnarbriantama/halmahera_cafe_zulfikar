@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Supplier</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Supplier</h2>
            <p class="section-lead">Menampilkan nama supplier.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Supplier</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <button href="" class="btn btn-success" data-toggle="modal" data-target="#tambahSuplier">Tambah Supplier</button>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Supplier</th>
                            <th>Nomer Hp</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Roni</td>
                            <td>0819675649877</td>
                            <td>
                              <a href="#" type="button" data-toggle="modal" data-target="#editSuplier" class="btn btn-warning">Edit</a>
                              <a href="#" type="button" id="hapus-suplier" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Noval sawit</td>
                            <td>089654789333</td>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahSuplier">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Suplier</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Suplier</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama suplier tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nomer Handphone</label>
                      <input type="number" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nomer Handphone tidak boleh kosong
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
          <div class="modal fade" tabindex="-1" role="dialog" id="editSuplier">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Edit Suplier</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Suplier</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama suplier tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nomer Handphone</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nomer handphone tidak boleh kosong
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
