@extends('layouts.admin.dashboard')

@section('title', 'Tambah Data Kelas')
@section('content')

    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">TAMBAH DATA JURUSAN</h2>
                    <hr>
                    <p class="card-text"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis, blanditiis.
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Tambah Data Jurusan</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                    dibawah </p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.jurusan') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="id_kelas">ID JURUSAN</label>
                            <input id="id_kelas" type="text" class="form-control" value="{{ old('class_id') }}"
                                name="id">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="kelas">JURUSAN</label>
                            <input id="kelas" type="text" value="{{ old('class_name') }}" class="form-control"
                                name="jurusan_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
