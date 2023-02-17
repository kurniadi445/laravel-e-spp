@extends('struktur.dasar')
@section('judul', 'Kelas')
{{-- css --}}
@push('css')
    <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/toastr/toastr.css') }}" rel="stylesheet">
@endpush
{{-- css --}}
{{-- js --}}
@push('js')
    <script defer src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script defer src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script defer src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script defer src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script defer src="{{ asset('js/master-data/kelas/index.js') }}"></script>
    <script defer src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script defer src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@endpush
{{-- js --}}
@section('konten')
    {{-- header konten --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dasbor') }}">Dasbor</a></li>
                        <li class="active breadcrumb-item">Kelas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- header konten --}}
    {{-- konten utama --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- kartu --}}
                    <div class="card">
                        {{-- header kartu --}}
                        <div class="card-header">
                            <h3 class="card-title">Kelas</h3>
                        </div>
                        {{-- header kartu --}}
                        {{-- badan kartu --}}
                        <div class="card-body">
                            {{-- tabel --}}
                            <table class="table table-bordered table-striped" id="tabel-kelas">
                                <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Kelas</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                            </table>
                            {{-- tabel --}}
                        </div>
                        {{-- badan kartu --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- konten utama --}}
@endsection
