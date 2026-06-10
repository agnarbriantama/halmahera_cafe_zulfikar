@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Detail Laporan Harian</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Harian</h2>
            <p class="section-lead"> {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Laporan</h4>
                        </div>
                        <div class="card-body">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="alert alert-success">
                                        Income :
                                        Rp {{ number_format($income,0,',','.') }}
                                    </div>

                                    <div class="alert alert-danger">
                                        Expense :
                                        Rp {{ number_format($expense,0,',','.') }}
                                    </div>

                                    <div class="alert alert-primary">
                                        Laba :
                                        Rp {{ number_format($income - $expense,0,',','.') }}
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
                    <h4>Tabel Transaksi</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Kode</th>
                            <th>Customer</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          @foreach($transaksi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode_transaksi }}</td>
                                <td>{{ $item->nama_customer }}</td>
                                <td>
                                    Rp {{ number_format($item->grand_total,0,',','.') }}
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Pengeluaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          @foreach($keuangan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    Rp {{ number_format($item->nominal,0,',','.') }}
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
@endsection
