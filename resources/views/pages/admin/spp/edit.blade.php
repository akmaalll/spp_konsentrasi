@extends('layouts.admin.dashboard')

@section('title', 'Edit Data SPP')
@section('content')

    <section class="section">
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Edit Data SPP</p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.spp', $item->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $item->id }}" id="">
                        <div class="form-group col-md-4">
                            <label for="year">TAHUN</label>
                            <input id="year" type="text" class="form-control" value="{{ $item->year }}"
                                name="year">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nominal">NOMINAL</label>
                            <input id="nominal" type="text" value="{{ $item->nominal }}" class="form-control"
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
