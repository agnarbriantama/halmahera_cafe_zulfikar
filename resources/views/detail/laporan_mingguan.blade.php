@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Detail Laporan Mingguan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Mingguan</h2>
            <p class="section-lead"> {{ $startDate->format('d-m-Y') }} - {{ $endDate->format('d-m-Y') }}</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Transaksi = Income</h4>
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
                      <div class="alert alert-primary">
                            <div class="d-flex justify-content-end">
                                <span>Total : Rp {{ number_format($income,0,',','.') }}</span>
                            </div>
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
                    <h4>Tabel Pengeluaran = Expence</h4>
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
                      <div class="alert alert-primary">
                            <div class="d-flex justify-content-end">
                                <span>Total : Rp {{ number_format($expense,0,',','.') }}</span>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                      <div class="alert alert-primary">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Income : Rp {{ number_format($income,0,',','.') }} - Expence : Rp {{ number_format($expense,0,',','.') }}</strong>
                                </div>
                                <div>
                                    <strong>Laba : Rp {{ number_format($income - $expense,0,',','.') }}</strong>
                                </div>
                            </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
