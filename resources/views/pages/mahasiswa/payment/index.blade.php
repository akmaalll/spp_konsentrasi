@extends('layouts.mahasiswa.dashboard')

@section('title', 'Data SPP')
@section('content')

    <section class="section">
        <div class="card card-primary">
            <div class="card-body">
                <h2 class="card-title text-dark">PENGELOLAAN DATA SPP</h2>
                <hr>
                <p class="card-text">Berikut merupakan halaman pengelolaan data SPP di aplikasi SPPIE.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary p-4">
                    <div class="table-responsive">
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
                                            {{ $item->fee->nominal }}
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
                                        @if ($item->status == 'paid')
                                            <td>
                                                <button class="btn btn-danger" disabled>Bayar</button>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('spp.mahasiswa.create'), $item->id }}"
                                                    class="btn btn-primary">Bayar</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session()->has('snapToken'))
        {{ session('snapToken') }}
    @endif



@endsection
