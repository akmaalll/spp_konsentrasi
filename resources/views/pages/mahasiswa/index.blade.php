@extends('layouts.mahasiswa.dashboard')

@section('content')
    <section class="section">

        <div class="section-header text-dark">
            <h1>Dashboard Mahasiswa | Halaman Utama</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('mahasiswas')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Lunas</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('payments')->where('nim', Auth::user()->nim)->where('status', 'paid')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Belum Lunas</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('payments')->where('nim', Auth::user()->nim)->where('status', 'unpaid')->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title text-dark">Melakukan pembayaran?</h2>
                <hr>
                <p class=" card-text">Anda dapat membayaran SPP dengan cepat melalui tombol
                    dibawah atau tombol disamping. </p>
                <a href="{{ route('spp.mahasiswa.index') }}" class="btn btn-primary">Bayar Sekarang ⭢</a>
            </div>
        </div>

    </section>
@endsection
