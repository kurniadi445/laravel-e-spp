<aside class="elevation-4 main-sidebar sidebar-dark-primary">
    {{-- logo --}}
    <a class="brand-link" href="{{ route('dasbor') }}">
        <img alt="Logo" class="brand-image elevation-3 img-circle" src="{{ asset('img/AdminLTELogo.png') }}" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    {{-- logo --}}
    {{-- sidebar --}}
    <div class="sidebar">
        {{-- panel pengguna sidebar --}}
        <div class="d-flex mb-3 mt-3 pb-3 user-panel">
            <div class="image"><img alt="Foto" class="img-circle elevation-2" src="{{ asset('img/user2-160x160.jpg') }}"></div>
            <div class="info">
                <a class="d-block" href="#">{{ $nama_depan_pengguna }}</a>
            </div>
        </div>
        {{-- panel pengguna sidebar --}}
        {{-- menu sidebar --}}
        <nav class="mt-2">
            <ul class="flex-column nav nav-pills nav-sidebar" data-accordion="false" data-widget="treeview" role="menu">
                {{-- dasbor --}}
                <li class="nav-item">
                    <a @class(['active' => url()->current() === route('dasbor'), 'nav-link']) href="{{ route('dasbor') }}">
                        <i class="fa-home fas nav-icon"></i>
                        <p>Dasbor</p>
                    </a>
                </li>
                {{-- dasbor --}}
                {{-- master data --}}
                <li @class(['menu-open' => url()->current() === route('master-data.siswa'), 'nav-item'])>
                    <a @class(['active' => url()->current() === route('master-data.siswa'), 'nav-link']) href="#">
                        <i class="fa-book fas nav-icon"></i>
                        <p>Master Data <i class="fa-angle-left fas right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a @class(['active' => url()->current() === route('master-data.siswa'), 'nav-link']) href="{{ route('master-data.siswa') }}">
                                <i class="fa-circle far nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- master data --}}
                {{-- keluar --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('autentikasi.keluar') }}">
                        <i class="fa-sign-out-alt fas nav-icon"></i>
                        <p>Keluar</p>
                    </a>
                </li>
                {{-- keluar --}}
            </ul>
        </nav>
        {{-- menu sidebar --}}
    </div>
    {{-- sidebar --}}
</aside>
