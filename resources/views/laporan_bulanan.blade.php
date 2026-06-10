@extends('layouts.component')

@section('title', 'Bahan Mentah')

@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Halaman Laporan Bulanan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Bulanan</h2>
            <p class="section-lead">Menampilkan aktifitas keuangan berdasarkan bulan.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Laporan Bulanan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Tanggal</th>
                            <th>Income</th>
                            <th>Expence</th>
                            <th>Laba Rugi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          @foreach($bulan as $index => $item)

                          <tr>
                              <td>{{ $index + 1 }}</td>

                              <td>
                                  {{ \Carbon\Carbon::create()
                                      ->month($item['bulan'])
                                      ->translatedFormat('F') }}
                                  {{ $item['tahun'] }}
                              </td>

                              <td>
                                  Rp {{ number_format($item['income'],0,',','.') }}
                              </td>

                              <td>
                                  Rp {{ number_format($item['expense'],0,',','.') }}
                              </td>

                              <td>
                                  Rp {{ number_format($item['laba'],0,',','.') }}
                              </td>

                              <td>
                                  <a href="{{ route('detail.bulanan',[$item['tahun'], $item['bulan']]) }}" class="btn btn-primary">
                                      Detail
                                  </a>
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
