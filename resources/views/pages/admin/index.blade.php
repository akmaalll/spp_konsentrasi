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
                            {{-- {{ DB::table('payments')->count() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="table-responsive bg-white p-4">
                        <table id="example" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
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
                                        <td>
                                            {{-- <button class="btn btn-danger"> --}}
                                            {{ $item->status }}
                                            {{-- </button> --}}
                                        </td>

                                        <td>
                                            {{-- <a href="" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a> --}}

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
