@extends('layouts.admin.dashboard')

@section('title', 'Data Kelas')
@section('content')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-dark">PENGELOLAAN DATA KELAS</h2>
                <hr>
                <p class="card-text"> Selamat datang di halaman pengelolaan data kelas. Disini anda dapat mengupdate,
                    menambah atauapun menghapus data kelas</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                        <div class="table-responsive">
                            <table id="example" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">JURUSAN</th>
                                        <th scope="col">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <th scope="row">
                                                {{ $item->id }}
                                            </th>
                                            <td>
                                                {{ $item->jurusan_name }}
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.jurusan', $item->id) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('destroy.jurusan', $item->id) }}" method="POST"
                                                    class="d-inline">
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
        </div>
    </section>

@endsection
