<?php

namespace App\View\Composers;

use App\Repositories\PengaturanRepository;
use Illuminate\View\View;

class PengaturanComposer
{
    private PengaturanRepository $pengaturanRepository;

    public function __construct(PengaturanRepository $pengaturanRepository)
    {
        $this->pengaturanRepository = $pengaturanRepository;
    }

    public function compose(View $view): void
    {
        $pengaturan = $this->pengaturanRepository->cariSatuBerdasarkanNamaPengaturan('nama_sekolah');

        $namaSekolah = $pengaturan->nilai ?? config('app.name');

        $view->with('nama_sekolah_pengaturan', $namaSekolah);
    }
}
