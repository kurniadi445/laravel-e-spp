{{-- kotak --}}
<div @class(['login-box' => url()->current() === route('autentikasi.masuk')])>
    {{-- logo --}}
    <div @class(['login-logo' => url()->current() === route('autentikasi.masuk')])>
        @if (url()->current() === route('autentikasi.masuk'))
            <a href="{{ route('autentikasi.masuk') }}"><b>Admin</b>LTE</a>
        @endif
    </div>
    {{-- logo --}}
    <div class="card">
        {{-- badan kartu --}}
        <div @class(['card-body', 'login-card-body' => url()->current() === route('autentikasi.masuk')])>
            @yield('konten')
        </div>
        {{-- badan kartu --}}
    </div>
</div>
{{-- kotak --}}
