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
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahMenu">Tambah Menu</a>
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
                          @foreach ($data as $index => $item)                                        
                          <tr>
                            <td>
                              {{ $index +1 }}
                            </td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->kategori_id }}</td>
                            <td>
                              <a href="{{route('menu.detail', $item->id)}}" type="button" class="btn btn-primary">Detail Resep</a>
                              <a type="button" 
                                 data-toggle="modal" 
                                 data-target="#editMenu" 
                                 class="btn btn-warning btn-edit-menu text-white"
                                 data-id="{{ $item->id }}"
                                 data-nama="{{ $item->nama_menu }}"
                                 data-harga="{{ $item->harga }}"
                                 data-kategori="{{ $item->kategori_id }}"
                                 data-deskripsi="{{ $item->deskripsi }}"
                                 >Edit</a>
                              <a href="#" type="button" class="btn btn-danger btn-hapus-menu" data-id="{{ $item->id }}" id="hapus-menu">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahMenu">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('menu.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                      <label>Nama Menu</label>
                      <input type="text" class="form-control" name="nama_menu" required>
                      <div class="invalid-feedback">
                        Nama menu tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="custom-select" required>
                            <option value="">-- Pilih kategori --</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                          Kategori tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control" name="harga" required>
                      <div class="invalid-feedback">
                        Harga tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <input type="text" class="form-control" name="deskripsi">
                    </div>
                     <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
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

          <div class="modal fade" tabindex="-1" role="dialog" id="editMenu">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Edit Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" id="editForm" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Nama Menu</label>
                      <input type="text" class="form-control" name="nama_menu" id="edit_nama" required>
                      <div class="invalid-feedback">
                        Nama menu tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control" name="harga" id="edit_harga" required>
                      <div class="invalid-feedback">
                        Minimal Stok tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id" id="edit_kategori" required>
                            <option value="">-- Pilih kategori --</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Kategori tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="4"></textarea>
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
