<!DOCTYPE html>
<html lang="id">
<head>
    {{-- meta --}}
    <meta charset="utf-8">
    <meta content="width=device-width" name="viewport">
    {{-- meta --}}
    <title>@yield('judul') - {{ $nama_sekolah_pengaturan }}</title>
    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    {{-- font --}}
    {{-- css --}}
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    @stack('css')
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    @stack('css')
    {{-- css --}}
    {{-- js --}}
    <script defer src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script defer src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('js')
    <script defer src="{{ asset('js/adminlte.min.js') }}"></script>
    {{-- js --}}
</head>
<body @class(['hold-transition', 'login-page' => url()->current() === route('autentikasi.masuk'), 'layout-fixed sidebar-mini' => !url()->current() === route('autentikasi.masuk')])>
@includeWhen(url()->current() === route('autentikasi.masuk'), 'struktur.tata-letak.autentikasi')
@includeUnless(url()->current() === route('autentikasi.masuk'), 'struktur.tata-letak.utama')
</body>
</html>
