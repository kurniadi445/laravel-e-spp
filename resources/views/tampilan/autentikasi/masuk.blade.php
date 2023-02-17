@extends('struktur.dasar')
@section('judul', 'Masuk')
{{-- css --}}
@push('css')
    <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/toastr/toastr.css') }}" rel="stylesheet">
@endpush
{{-- css --}}
{{-- js --}}
@push('js')
    <script defer src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if ($errors->any())
        <script defer src="{{ asset('js/autentikasi/masuk.js') }}"></script>
    @endif
@endpush
{{-- js --}}
@section('konten')
    <p class="login-box-msg">Masuk ke akun Anda</p>
    <form method="post">
        @csrf
        <div class="input-group mb-3">
            <input autofocus class="form-control" name="nama-pengguna" placeholder="Nama Pengguna" type="text">
            <div class="input-group-append">
                <div class="input-group-text"><i class="fa-user fas"></i></div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input autofocus class="form-control" name="password" placeholder="Password" type="password">
            <div class="input-group-append">
                <div class="input-group-text"><i class="fa-lock fas"></i></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input id="masukan-ingat-saya" name="ingat-saya" type="checkbox">
                    <label for="masukan-ingat-saya">Ingat Saya</label>
                </div>
            </div>
            <div class="col-4">
                <button class="btn btn-block btn-primary" type="submit">Masuk</button>
            </div>
        </div>
    </form>
@endsection
