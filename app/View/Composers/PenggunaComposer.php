<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PenggunaComposer
{
    public function compose(View $view): void
    {
        $pengguna = Auth::user();

        $namaDepan = $pengguna->{'nama_depan'};

        $view->with('nama_depan_pengguna', $namaDepan);
    }
}
