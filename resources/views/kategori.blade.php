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
                          @foreach ($data as $index => $item)                                  
                          <tr>
                            <td>
                              {{ $index +1 }}
                            </td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                              <a type="button" 
                                 data-toggle="modal" 
                                 data-target="#editKategori" 
                                 class="btn btn-warning btn-edit-kategori text-white"
                                 data-id="{{ $item->id }}"
                                 data-nama="{{ $item->nama_kategori }}"
                                 data-keterangan="{{ $item->keterangan }}"
                                 >Edit</a>
                              <a href="#" type="button" class="btn btn-danger btn-hapus-kategori" data-id="{{ $item->id }}" id="hapus-kategori">Hapus</a>
                            </td>
                          </tr>
                          @endforeach
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
                  <form action="{{ route('kategori.create') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" class="form-control" name="nama_kategori" required>
                      <div class="invalid-feedback">
                        Nama kategori tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" required>
                      <div class="invalid-feedback">
                        Keterangan tidak boleh kosong
                      </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
                  <form method="POST" id="editForm" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" class="form-control" name="nama_kategori" id="edit_nama" required>
                      <div class="invalid-feedback">
                        Nama kategori tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" id="edit_keterangan" required>
                      <div class="invalid-feedback">
                        Keterangan tidak boleh kosong
                      </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <form id="form-hapus" method="POST" style="display:none;">
              @csrf
              @method('DELETE')
          </form>

          @if(session('success'))
            <div id="flash-success" data-message="{{ session('success') }}"></div>
          @endif
@endsection
