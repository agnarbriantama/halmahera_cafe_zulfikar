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
                    <div class="form-group">
                      <label>Nama Bahan</label>
                      <select class="form-control select2">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jumlah Bahan</label>
                      <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Total Harga</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            $
                          </div>
                        </div>
                        <input type="text" class="form-control currency">
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                      <a href="#" class="btn btn-success">Tambah</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
