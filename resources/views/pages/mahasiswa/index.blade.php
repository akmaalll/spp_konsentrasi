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

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary p-4">
                    <div class="table-responsive">
                        @if ($items->where('status', 'paid')->count() > 0)
                            <table id="mhs" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">NAMA MAHASISWA</th>
                                        <th scope="col">JURUSAN</th>
                                        <th scope="col">SEMESTER</th>
                                        <th scope="col">TAHUN</th>
                                        <th scope="col">TOTAL BAYAR</th>
                                        <th scope="col">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                       
                                        <tr>
                                            <th scope="row">
                                                {{ $item->nim }}
                                            </th>
                                            <td>
                                                {{ $item->mahasiswa->name }}
                                            </td>
                                            <td>
                                                {{ $item->mahasiswa->jurusan->jurusan_name }}
                                            </td>
                                            <td>
                                                {{ $item->fee->semester }}
                                            </td>
                                            <td>
                                                {{ $item->fee->year }}
                                            </td>
                                            <td>
                                                @currency($item->fee->nominal)
                                            </td>
                                            @if ($item->status == 'paid')
                                                <td>
                                                    <button class="btn btn-success">{{ $item->status }}</button>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-warning">{{ $item->status }}</button>
                                                </td>
                                            @endif
                                            {{-- <form action="{{ route('spp.mahasiswa.store') }}" method="POST">
                                            @csrf
                                            <td>
                                                <button class="btn btn-primary" id="pay-button">Bayar</button>
                                            </td>
                                        </form> --}}
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada pembayaran dengan status 'paid'.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
