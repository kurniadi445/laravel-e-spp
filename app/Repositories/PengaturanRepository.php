<?php

namespace App\Repositories;

use App\Models\Pengaturan;

class PengaturanRepository
{
    public function cariSatuBerdasarkanNamaPengaturan($nama_pengaturan): object|null
    {
        $pengaturan = Pengaturan::query()->where('nama_pengaturan', '=', $nama_pengaturan);

        return $pengaturan->first();
    }
}
