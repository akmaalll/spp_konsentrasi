@extends('layouts.admin.dashboard')

@section('title', 'Tambah Transaksi SPP')
@section('content')

    <section class="section">
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Tambah Data SPP</p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.spp') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="year">TAHUN</label>
                            <input id="year" type="text" class="form-control" value="{{ old('year') }}"
                                name="year">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="semester">SEMESTER</label>
                            <select name="semester" id="semester" class="form-control" id="exampleFormControlSelect1">
                                <option value="">=== Pilih Semester ===</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nominal">NOMINAL</label>
                            <input id="nominal" type="text" value="{{ old('nominal') }}" class="form-control"
                                name="nominal">
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
