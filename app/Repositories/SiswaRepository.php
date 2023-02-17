<?php

namespace App\Repositories;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaRepository
{
    public function cariSemua($cari, $sortir = null, $panjang = null, $mulai = null)
    {
        $kolom = [];

        if ($sortir) {
            $kolom[] = DB::raw(sprintf('ROW_NUMBER() over (order by %s) no', $sortir));
        } else {
            $kolom[] = DB::raw('ROW_NUMBER() over (order by nis) no');
        }

        $kolom[] = 'uuid';
        $kolom[] = 'nis';
        $kolom[] = 'nisn';
        $kolom[] = 'nama_lengkap';
        $kolom[] = 'jenis_kelamin';
        $kolom[] = 'agama';
        $kolom[] = 'status';

        $siswa = Siswa::query()->select($kolom);
        $siswa = $siswa->whereNull('tanggal_dihapus');

        if (!is_null($cari)) {
            $siswa = $siswa->where(function ($kueri) use ($cari) {
                $kueri = $kueri->whereRaw('LOWER(nis) like ?', [$cari]);
                $kueri = $kueri->orWhereRaw('LOWER(nisn) like ?', [$cari]);

                $kueri->orWhereRaw('LOWER(nama_lengkap) like ?', [$cari]);
            });
        }

        if (!is_null($panjang) && !is_null($mulai)) {
            $siswa = $siswa->limit($panjang);
            $siswa = $siswa->offset($mulai);
        }

        return $siswa->get();
    }

    public function hitung($cari = null): int
    {
        return $this->cariSemua($cari)->count();
    }

    public function cariSatuBerdasarkanUuid($uuid): object|null
    {
        $siswa = Siswa::query()->where('uuid', '=', $uuid);

        return $siswa->first();
    }

    public function perbaruiBerdasarkanUuid($uuid, $nilai): void
    {
        $siswa = Siswa::query()->where('uuid', '=', $uuid);

        $siswa->update($nilai);
    }
}
