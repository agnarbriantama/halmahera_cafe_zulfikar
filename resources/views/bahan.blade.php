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
                      <button href="" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah</button>
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
                              <a href="#" type="button" data-toggle="modal" data-target="#editModal" class="btn btn-warning">Edit</a>
                              <a href="#" type="button" class="btn btn-danger" id="hapus-bahan">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Bahan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama bahan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="custom-select">
                          <option value="1">Kilogram</option>
                          <option value="2">Ons</option>
                          <option value="3">Gram</option>
                      </select>
                      <div class="invalid-feedback">
                        Satuan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Minimal Stok</label>
                      <input type="number" class="form-control" required="">
                      <div class="invalid-feedback">
                        Minimal Stok tidak boleh kosong
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
          <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Edit Bahan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <input type="text" class="form-control" required="">
                      <div class="invalid-feedback">
                        Nama bahan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="custom-select">
                          <option value="1">Kilogram</option>
                          <option value="2">Ons</option>
                          <option value="3">Gram</option>
                      </select>
                      <div class="invalid-feedback">
                        Satuan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Minimal Stok</label>
                      <input type="number" class="form-control" required="">
                      <div class="invalid-feedback">
                        Minimal Stok tidak boleh kosong
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
