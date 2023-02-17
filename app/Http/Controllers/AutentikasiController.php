<?php

namespace App\Http\Controllers;

use App\Repositories\PenggunaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    private PenggunaRepository $penggunaRepository;

    public function __construct(PenggunaRepository $penggunaRepository)
    {
        $this->penggunaRepository = $penggunaRepository;
    }

    public function masuk(): Factory|View|Application
    {
        return view('tampilan.autentikasi.masuk');
    }

    public function prosesMasuk(Request $request): RedirectResponse
    {
        $namaPengguna = $request->input('nama-pengguna');
        $password = $request->input('password');
        $ingatSaya = $request->input('ingat-saya') === 'on';

        if (Auth::attempt(['nama_pengguna' => $namaPengguna, 'password' => $password, 'blokir' => false], $ingatSaya)) {
            $request->session()->regenerate();

            $id = Auth::user()->getAuthIdentifier();

            $this->penggunaRepository->perbaruiBerdasarkanId($id, [
                'terakhir_masuk' => date('Y-m-d H:i:s')
            ]);

            return to_route('dasbor');
        }

        return back()->withErrors([
            'nama-pengguna'
        ]);
    }

    public function keluar(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('autentikasi.masuk');
    }
}
