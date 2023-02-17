<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Repositories\KelasRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    private KelasRepository $kelasRepository;

    public function __construct(KelasRepository $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }

    public function index(): Factory|View|Application
    {
        return view('tampilan.master-data.kelas.index');
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
                1 => 'nama_kelas'
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

        $kelas = $this->kelasRepository->cariSemua($cari, $sortir, $panjang, $mulai);
        $jumlahKelas = $this->kelasRepository->hitung();
        $jumlahTersaring = $this->kelasRepository->hitung($cari);

        return response()->json([
            'data' => $kelas,
            'draw' => $penarikan,
            'recordsFiltered' => $jumlahTersaring,
            'recordsTotal' => $jumlahKelas
        ]);
    }
}
