@extends('layouts.component')

@section('title', 'Akses Ditolak')

@section('content')

<div class="section">
    <div class="section-body">

        <div class="empty-state"
             data-height="400">

            <div class="empty-state-icon">
                <i class="fas fa-lock"></i>
            </div>

            <h2>Akses Ditolak</h2>

            <p class="lead">
                Anda tidak memiliki izin untuk membuka halaman ini.
            </p>

            <a href="{{ route('dashboard') }}"
               class="btn btn-primary mt-4">
                Kembali ke Dashboard
            </a>

        </div>

    </div>
</div>

@endsection