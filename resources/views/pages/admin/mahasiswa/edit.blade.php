@extends('layouts.admin.dashboard')

@section('title', 'Update Data Siswa')
@section('content')


    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">UPDATE DATA SISWA</h2>
                    <hr>
                    <p class="card-text"> Disini anda dapat mengupdate data siswa yang sebelumnya anda pilih. Perlu
                        diketahui admin tidak dapat mengganti password siswa, hanya dapat mengganti data data yang tertera
                        dibawah.
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Update Data Mahasiswa</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                    dibawah </p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.mahasiswa', $item->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nisn">NIM</label>
                            <input id="nisn" type="text" class="form-control" value="{{ $item->nim }}"
                                name="nim">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="name">NAMA</label>
                            <input id="name" type="text" value="{{ $item->name }}" class="form-control"
                                name="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">USERNAME</label>
                            <input id="username" type="text" value="{{ $item->username }}" class="form-control"
                                name="username">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomor_telepon">NOMOR TELEPON</label>
                            <input id="nomor_telepon" type="number" value="{{ $item->phone }}" class="form-control"
                                name="phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <textarea class="form-control" id="alamat" name="address" rows="5">{{ $item->address }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jurusan_id">KELAS</label>
                            <select id="jurusan_id" class="form-control" name="jurusan_id">
                                <option value="">Pilih Kelas</option>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}"
                                        {{ $item->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                                        {{ $jurusan->jurusan_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
