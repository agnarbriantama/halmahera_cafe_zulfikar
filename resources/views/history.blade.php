@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman History</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">History Stok</h2>
            <p class="section-lead">Menampilkan history pengeluaran atau pemasukan stok bahan baku.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Stok</h4>
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
                            <th>Type</th>
                            <th>Jumlah</th>
                            <th>Ketarangan</th>
                          </tr>
                        </thead>
                        <tbody> 
                          @foreach ($data as $index => $item)                                     
                          <tr>
                            <td>
                              {{ $index + 1 }}
                            </td>
                            <td>{{ $item->nama_bahan }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                            <td>{{ $item->keterangan }}</td>
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
@endsection
