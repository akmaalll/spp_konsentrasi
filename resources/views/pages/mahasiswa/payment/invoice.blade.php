@extends('layouts.mahasiswa.dashboard')

@section('title', 'Invoice SPP')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Invoice</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Spp</a></div>
                <div class="breadcrumb-item">Invoice</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoice</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive bg-white p-4">
                                <table id="mhs" class="table align-items-center table-flush">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Order ID </th>
                                            <td><b>: {{ $payment->order_id }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Mahasiswa </th>
                                            <td>: {{ $payment->mahasiswa->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Paid at</th>
                                            <td>: {{ $payment->paid_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Harga</th>
                                            <td>: {{ $payment->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>:
                                                <button class="btn btn-icon icon-left btn-success "><i
                                                        class="fas fa-check"></i>
                                                    {{ $payment->status }}</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('spp.mahasiswa.index') }}"> <button
                                        class="btn btn-danger">Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
