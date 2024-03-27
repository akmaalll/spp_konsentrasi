@extends('layouts.admin.dashboard')

@section('title', 'Tambah Data Siswa')
@section('content')

    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">TAMBAH DATA SISWA</h2>
                    <hr>
                    <p class="card-text"> Dihalaman ini anda dapat membuat data baru siswa, cukup isi data yang diperlukan
                        dibawah ini
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Tambah Data Siswa</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                    dibawah </p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.mahasiswa') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nim">NIM</label>
                            <input id="nim" type="text" class="form-control" value="{{ old('nim') }}"
                                name=" nim">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="name">NAMA</label>
                            <input id="name" type="text" value="{{ old('name') }}" class=" form-control"
                                name="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">USERNAME</label>
                            <input id="username" type="text" value="{{ old('username') }}" class=" form-control"
                                name="username">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">PASSWORD</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <textarea class="form-control" id="alamat" name="address" rows="5">{{ old('address') }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomor_telepon">NOMOR TELEPON</label>
                            <input id="nomor_telepon" type="number" value="{{ old('phone') }}" class=" form-control"
                                name="phone">
                        </div>
                        {{-- <div class="form-group col-md-6">
                        <label for="kelas">KELAS</label>
                        <input id="kelas" type="text" value="{{ old('class') }}" class="form-control" name="class">
                </div> --}}
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">JURUSAN</label>
                            <select name="jurusan_id" id="kelas" class="form-control" id="exampleFormControlSelect1">
                                <option value="">=== Pilih Jurusan ===</option>
                                @foreach ($jurusan as $id => $jurusan_name)
                                    <option value="{{ $id + 1 }}">{{ $jurusan_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
