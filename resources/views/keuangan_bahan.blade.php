@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Pembelian Bahan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pembelian Bahan</h2>
            <p class="section-lead">Menampilkan aktifitas pengeluaran pembelian bahan baku.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Input Pembelian Bahan</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('keuangan-bahan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <select id="bahan_select" name="bahan_id" class="form-control">
                          @foreach($data as $item)
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
                      <label>Jumlah Bahan</label>
                      <input type="number" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Total Harga</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            $
                          </div>
                        </div>
                        <input type="number" name="nominal" class="form-control currency">
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                      <button type="submit"  class="btn btn-success">Tambah</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @if(session('success'))
            <div id="flash-success" data-message="{{ session('success') }}"></div>
        @endif
        <script>
            var bahanData = JSON.parse('@json($data)');
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
