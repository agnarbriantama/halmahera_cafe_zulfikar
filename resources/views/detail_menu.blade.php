@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Detail Menu</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Detail Menu</h2>
            <p class="section-lead">Menampilkan detail menu.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Resep</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image" data-background="{{ asset('storage/' . $menu->foto) }}">
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <article class="article article-style-c">
                                        <div class="article-details">
                                            <div class="article-category"><a>Kategori</a> <div class="bullet"></div> <a>{{ $menu->kategori->nama_kategori }}</a></div>
                                            <div class="article-title">
                                            <h2><a>{{ $menu->nama_menu }}</a></h2>
                                            <h2><a>Harga Rp {{ number_format($menu->harga, 0, ',', '.') }}</a></h2>
                                            </div>
                                            <p>Deskripsi : {{ $menu->deskripsi }}. </p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Resep</h4>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahResep">Tambah Resep</a>
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
                          @foreach ($menu->resep as $index => $item)                                 
                          <tr>
                            <td>
                              {{ $index +1 }}
                            </td>
                            <td>{{ $item->bahan->nama_bahan ?? '-' }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>
                              <a type="button" 
                                 data-toggle="modal" 
                                 data-target="#editResep" 
                                 class="btn btn-warning btn-edit-resep text-white"
                                 data-id="{{ $item->id }}"
                                 data-jumlah="{{ $item->jumlah }}"
                                 data-satuan="{{ $item->satuan }}"
                                 >Edit</a>
                              <a href="#" type="button" class="btn btn-danger btn-hapus-resep" data-id="{{ $item->id }}" id="hapus-resep">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahResep">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Tambah Resep {{ $menu->nama_menu }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('resep.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <div class="form-group">
                        <label>Bahan</label>
                        <select id="bahan_select" name="bahan_id" class="form-control">
                            <option>-- Pilih bahan --</option>
                             @foreach($bahan as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_bahan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" required>
                      <div class="invalid-feedback">
                        Jumlah tidak boleh kosong
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

          <div class="modal fade" tabindex="-1" role="dialog" id="editResep">
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
                      <label>Satuan</label>
                      <input type="text" class="form-control" name="satuan" id="edit_satuan" required>
                      <div class="invalid-feedback">
                        Satuan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" id="edit_jumlah" required>
                      <div class="invalid-feedback">
                        Jumlah tidak boleh kosong
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
          <script>
            var bahanData = JSON.parse('@json($bahan)');
        </script>
        <script>
          document.addEventListener("DOMContentLoaded", function () {

              const select = document.getElementById('bahan_select');
              const inputSatuan = document.getElementById('satuan');

              select.addEventListener('change', function () {
                  const id = this.value;

                  const bahan = bahanData.find(item => item.id == id);

                  console.log('ID:', id);
                  console.log('DATA:', bahan);

                  if (bahan) {
                      inputSatuan.value = bahan.satuan;
                  } else {
                      inputSatuan.value = '';
                  }
              });

              // trigger awal
              select.dispatchEvent(new window.Event('change'));

          });
        </script>
@endsection
