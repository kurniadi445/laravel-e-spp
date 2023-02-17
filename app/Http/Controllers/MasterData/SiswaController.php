<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Repositories\SiswaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private SiswaRepository $siswaRepository;

    public function __construct(SiswaRepository $siswaRepository)
    {
        $this->siswaRepository = $siswaRepository;
    }

    public function index(): Factory|View|Application
    {
        return view('tampilan.master-data.siswa.index');
    }

    public function data(Request $request): JsonResponse
    {
        $penarikan = $request->query('draw');
        $panjang = $request->query('length');
        $mulai = $request->query('start');

        if (isset($request->query('search')['value'])) {
            $cari = sprintf('%%%s%%', strtolower($request->query('search')['value']));
        } else {
            $cari = null;
        }

        $sortir = [];

        if (is_array($request->query('order'))) {
            $kolom = [
                1 => 'nis',
                2 => 'nisn',
                3 => 'nama_lengkap',
                4 => 'jenis_kelamin',
                5 => 'agama',
                6 => 'status'
            ];

            foreach ($request->query('order') as $o) {
                if (isset($o['column'], $o['dir'])) {
                    if (isset($kolom[$o['column']])) {
                        $sortir[] = $o['dir'] === 'asc' ? $kolom[$o['column']] : sprintf('%s %s', $kolom[$o['column']], 'desc');
                    }
                }
            }
        }

        $sortir = implode(', ', $sortir);

        $siswa = $this->siswaRepository->cariSemua($cari, $sortir, $panjang, $mulai);
        $jumlahSiswa = $this->siswaRepository->hitung();
        $jumlahTersaring = $this->siswaRepository->hitung($cari);

        return response()->json([
            'data' => $siswa,
            'draw' => $penarikan,
            'recordsFiltered' => $jumlahTersaring,
            'recordsTotal' => $jumlahSiswa
        ]);
    }
}
