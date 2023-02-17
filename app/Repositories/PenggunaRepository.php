<?php

namespace App\Repositories;

use App\Models\Pengguna;

class PenggunaRepository
{
    public function perbaruiBerdasarkanId($id, $nilai): void
    {
        $pengguna = Pengguna::query()->where('id', '=', $id);

        $pengguna->update($nilai);
    }
}
