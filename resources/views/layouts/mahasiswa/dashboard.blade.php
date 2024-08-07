<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Riwayat Pembayaran') — SPPIE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    @include('includes.mahasiswa.style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('includes.mahasiswa.navbar')
            <div class="main-sidebar">
                @include('includes.mahasiswa.sidebar')
            </div>
            <div class="main-content">
                @yield('content')
            </div>
            @include('includes.mahasiswa.footer')
        </div>
    </div>
    @include('includes.mahasiswa.script')
</body>

</html>
