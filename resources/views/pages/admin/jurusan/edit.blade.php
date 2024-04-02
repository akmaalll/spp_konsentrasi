@extends('layouts.admin.dashboard')

@section('content')
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Update Data Jurusan</h2>
                    <hr>
                    <p class="card-text"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam, ut!
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Update Jurusan</p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.jurusan', $item->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="id_kelas">ID KELAS</label>
                            <input id="id_kelas" type="text" class="form-control" value="{{ $item->id }}"
                                name="id">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="kelas">KELAS</label>
                            <input id="kelas" type="text" value="{{ $item->jurusan_name }}" class="form-control"
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
