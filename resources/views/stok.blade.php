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
                          @foreach ($data as $index => $item)                                 
                          <tr>
                            <td>
                              {{ $index + 1 }}
                            </td>
                            <td>{{ $item->nama_bahan }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->minimal_stok }}</td>
                            <td>
                              @if ($item->jumlah_stok <= $item->minimal_stok)
                                  <span class="text-danger">
                                      {{ $item->jumlah_stok }} {{ $item->satuan }} (Stok Menipis)
                                  </span>
                              @else
                                  {{ $item->jumlah_stok }} {{ $item->satuan }}
                              @endif
                            </td>
                            <td>
                              <a href="#" 
                                 class="btn btn-info btn-tambah-stok" 
                                 data-toggle="modal" 
                                 data-target="#tambahStok"
                                 data-id="{{ $item->id }}"
                                 data-nama="{{ $item->nama_bahan }}"
                                 data-satuan="{{ $item->satuan }}"
                                 >Tambah Stok</a>
                              <a href="#" 
                                 class="btn btn-primary btn-pengurangan-stok" 
                                 data-toggle="modal" 
                                 data-target="#penguranganStok"
                                 data-id="{{ $item->id }}"
                                 data-nama="{{ $item->nama_bahan }}"
                                 data-satuan="{{ $item->satuan }}"
                                 >Pengurangan Stok</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahStok">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Stok</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('stok.tambah') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="bahan_id" id="tambah_bahan_id">
                    <div class="form-group">
                        <label>Nama Bahan</label>
                        <input type="text" id="tambah_nama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" id="tambah_satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" required>
                      <div class="invalid-feedback">
                        Jumlah tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nominal</label>
                      <input type="number" class="form-control" name="nominal" required>
                      <div class="invalid-feedback">
                        Nominal tidak boleh kosong
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
          <div class="modal fade" tabindex="-1" role="dialog" id="penguranganStok">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Pengurangan Stok</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('stok.pengurangan') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="bahan_id" id="pengurangan_bahan_id">
                    <div class="form-group">
                        <label>Nama Bahan</label>
                        <input type="text" id="pengurangan_nama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" id="pengurangan_satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" required>
                      <div class="invalid-feedback">
                        Jumlah tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan">
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
          @if(session('success'))
            <div id="flash-success" data-message="{{ session('success') }}"></div>
          @endif
@endsection
