<?php

namespace App\Repositories;

use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class KelasRepository
{
    public function cariSemua($cari, $sortir = null, $panjang = null, $mulai = null)
    {
        $kolom = [];

        if ($sortir) {
            $kolom[] = DB::raw(sprintf('ROW_NUMBER() over (order by %s) no', $sortir));
        } else {
            $kolom[] = DB::raw('ROW_NUMBER() over (order by nama_kelas) no');
        }

        $kolom[] = 'nama_kelas';
        $kolom[] = 'keterangan';

        $kelas = Kelas::query()->select($kolom);

        if (!is_null($cari)) {
            $kelas = $kelas->whereRaw('LOWER(nama_kelas) like ?', [$cari]);
        }

        if (!is_null($panjang) && !is_null($mulai)) {
            $kelas = $kelas->limit($panjang);
            $kelas = $kelas->offset($mulai);
        }

        return $kelas->get();
    }

    public function hitung($cari = null): int
    {
        return $this->cariSemua($cari)->count();
    }
}
