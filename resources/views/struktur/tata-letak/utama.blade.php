{{-- pembungkus --}}
<div class="wrapper">
    {{-- pramemuat --}}
    @include('struktur.komponen.pramemuat')
    {{-- pramemuat --}}
    {{-- navbar --}}
    @include('struktur.komponen.navbar')
    {{-- navbar --}}
    {{-- sidebar --}}
    @include('struktur.komponen.sidebar')
    {{-- sidebar --}}
    {{-- pembungkus konten --}}
    <div class="content-wrapper">
        @yield('konten')
    </div>
    {{-- pembungkus konten --}}
    {{-- footer --}}
    @include('struktur.komponen.footer')
    {{-- footer --}}
    {{-- kontrol sidebar --}}
    <aside class="control-sidebar control-sidebar-dark"></aside>
    {{-- kontrol sidebar --}}
</div>
{{-- pembungkus --}}
