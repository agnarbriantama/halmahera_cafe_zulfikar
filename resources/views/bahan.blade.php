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
                          @foreach ($data as $index => $item)                                
                          <tr>
                            <td>
                              {{ $index + 1 }}
                            </td>
                            <td>{{ $item->nama_bahan }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->minimal_stok }}</td>
                            <td>
                              <a type="button" 
                                 data-toggle="modal" 
                                 data-target="#editModal" 
                                 class="btn btn-warning btn-edit text-white"
                                 data-id="{{ $item->id }}"
                                 data-nama="{{ $item->nama_bahan }}"
                                 data-satuan="{{ $item->satuan }}"
                                 data-minimal="{{ $item->minimal_stok }}"
                                 >Edit</a>
                              <a href="#" type="button" class="btn btn-danger btn-hapus" data-id="{{ $item->id }}" id="hapus-bahan">Hapus</a>
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
                  <form action="{{ route('bahan.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <input type="text" class="form-control" name="nama_bahan" required>
                      <div class="invalid-feedback">
                        Nama bahan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="custom-select" name="satuan">
                          <option value="">-- Pilih Satuan --</option>
                          <option value="Kilogram">Kilogram</option>
                          <option value="Ons">Ons</option>
                          <option value="Gram">Gram</option>
                      </select>
                      <div class="invalid-feedback">
                        Satuan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Minimal Stok</label>
                      <input type="number" name="minimal_stok" class="form-control" required>
                      <div class="invalid-feedback">
                        Minimal Stok tidak boleh kosong
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
                  <form method="POST" id="editForm" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <input type="text" class="form-control" name="nama_bahan" id="edit_nama" required>
                      <div class="invalid-feedback">
                        Nama bahan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="custom-select" name="satuan" id="edit_satuan" required>
                          <option value="Kilogram">Kilogram</option>
                          <option value="Ons">Ons</option>
                          <option value="Gram">Gram</option>
                      </select>
                      <div class="invalid-feedback">
                        Satuan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Minimal Stok</label>
                      <input type="number" class="form-control" name="minimal_stok" id="edit_minimal" required>
                      <div class="invalid-feedback">
                        Minimal Stok tidak boleh kosong
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
