@extends('layouts.mahasiswa.dashboard')

@section('title', 'Data SPP')
@section('content')

    <section class="section">
        <div class="card card-primary">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 40px;">
                    INVOICE</p>
                <hr>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="year">NIM</label>
                        <input id="year" type="text" class="form-control" value="{{ $payment->nim }}" name="year"
                            readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="semester">NAMA</label>
                        <input id="year" type="text" class="form-control" value="{{ $payment->mahasiswa->name }}"
                            readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="semester">JURUSAN</label>
                        <input id="year" type="text" class="form-control"
                            value="{{ $payment->mahasiswa->jurusan->jurusan_name }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nominal">SEMESTER</label>
                        <input id="nominal" type="text" value="{{ $payment->fee->semester }}" class="form-control"
                            name="nominal" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nominal">TAHUN</label>
                        <input id="nominal" type="text" value="{{ $payment->fee->year }}" class="form-control"
                            name="nominal" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nominal">NOMINAL</label>
                        <input id="nominal" type="text" value="{{ $payment->fee->nominal }}" class="form-control"
                            name="nominal" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="pay-button" class="btn btn-primary btn-block">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.pay('{{ $snapToken }}', {
                // embedId: 'snap-container',
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    window.location.href = '/mhs/spp'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>

@endsection
