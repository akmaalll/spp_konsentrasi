@extends('layouts.admin.dashboard')

@section('title', 'Tambah Transaksi SPP')
@section('content')

    <section class="section">
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Tambah Data Transaksi SPP</p>
                <hr>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.payment') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">NIM</label>
                            <select name="nim" id="nim" class="form-control" id="exampleFormControlSelect1">
                                <option value="">=== Pilih Nim ===</option>
                                @foreach ($mahasiswas as $id => $mahasiswa)
                                    <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nim }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="name">NAMA MAHASISWA</label>
                            <input id="name" type="text" value="" class="form-control" name=""
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">SPP ID</label>
                            <select name="spp_id" id="spp_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="">=== Pilih SPP ===</option>
                                @foreach ($spps as $id => $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">SEMESTER</label>
                            <input type="text" value="" class="form-control" id="semester" name=""
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jumlah_bayar">JUMLAH BAYAR</label>
                            <input type="text" value="" class="form-control" id="jumlah_bayar" name="amount"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">PAY AT</label>
                            <input type="date" class="form-control" name="paid_at" id="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jumlah_bayar">PAY MONTH</label>
                            <select name="paid_month" class="form-control" id="exampleFormControlSelect1">
                                <option value="">=== Pilih Bulan ===</option>
                                <option>JANUARI</option>
                                <option>FEBRUARI</option>
                                <option>MARET</option>
                                <option>APRIL</option>
                                <option>MEI</option>
                                <option>JUNI</option>
                                <option>JULI</option>
                                <option>AGUSTUS</option>
                                <option>SEPTEMBER</option>
                                <option>OKTOBER</option>
                                <option>NOVEMBER</option>
                                <option>DESEMBER</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">TAHUN</label>
                            <input type="text" value="" class="form-control" id="tahun" name="paid_year"
                                readonly>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="unpaid" id="">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#nim').change(function() {
            var nim = $(this).val();
            console.log(nim);
            $.ajax({
                url: '/admin/get-nama-mahasiswa',
                type: 'GET',
                data: {
                    nim: nim
                },
                success: function(response) {
                    $('#name').val(response.name);
                },
                error: function(xhr, status, error) {
                    console.error(xhr
                        .responseText);
                    alert("Terjadi kesalahan saat mengambil data nama mahasiswa. Silakan coba lagi.");
                }
            });
        });

        $('#spp_id').change(function() {
            var id = $(this).val();
            // console.log(id);
            $.ajax({
                url: '/admin/get-nama-spp',
                type: 'GET',
                data: {
                    id: id,
                },
                success: function(response) {
                    $('#jumlah_bayar').val(response.nominal);
                    $('#semester').val(response.semester);
                    $('#tahun').val(response.year);
                },
                error: function(xhr, status, error) {
                    console.error(xhr
                        .responseText);
                    alert("Terjadi kesalahan saat mengambil data nama mahasiswa. Silakan coba lagi.");
                }
            });
        });
    </script>
@endsection
