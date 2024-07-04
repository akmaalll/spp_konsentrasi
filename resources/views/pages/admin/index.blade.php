@extends('layouts.admin.dashboard')

@section('title', 'Dashboard Admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
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
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jurusan</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('jurusans')->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{ DB::table('payments')->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                    </div>
                    <div class="card-body">
                        <p>Jika anda ingin segera melakukan pembayaran atau melakukan transaksi SPP silahkan klik disini</p>
                        <a href="{{ route('create.payment') }}" class="btn btn-primary btn-pill">Tambah Transaksi →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('dashboard_admin') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            value="{{ request('nim') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select class="form-control" id="jurusan" name="jurusan">
                                            <option value="">All</option>
                                            @foreach ($jurusans as $jurusan)
                                                <option value="{{ $jurusan->id }}"
                                                    {{ request('jurusan') == $jurusan->id ? 'selected' : '' }}>
                                                    {{ $jurusan->jurusan_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control" id="semester" name="semester">
                                            <option value="">All</option>
                                            @foreach (range(1, 8) as $semester)
                                                <option value="{{ $semester }}"
                                                    {{ request('semester') == $semester ? 'selected' : '' }}>
                                                    {{ $semester }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-3 mb-3">
                                    <div class="form-group">
                                        <label for="year">Tahun</label>
                                        <select class="form-control" id="year" name="year">
                                            <option value="">All</option>
                                            @foreach (range(date('Y') - 5, date('Y')) as $year)
                                                <option value="{{ $year }}"
                                                    {{ request('year') == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive bg-white p-4">
                        <table id="example" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA MAHASISWA</th>
                                    <th scope="col">JURUSAN</th>
                                    <th scope="col">SEMESTER</th>
                                    <th scope="col">TAHUN</th>
                                    <th scope="col">TOTAL BAYAR</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $item->order_id }}
                                        </th>
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

                                        <td>
                                            <form action="{{ route('destroy.payment', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
