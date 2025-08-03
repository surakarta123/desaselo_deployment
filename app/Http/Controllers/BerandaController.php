<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\VideoProfil;
use App\Models\PerangkatDesa;
use App\Models\JenisKelamin;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil jumlah berdasarkan jenis_kelamin
        $jumlahLakiLaki = JenisKelamin::where('jenis_kelamin', 'Laki-laki')->value('jumlah') ?? 0;
        $jumlahPerempuan = JenisKelamin::where('jenis_kelamin', 'Perempuan')->value('jumlah') ?? 0;
        $totalPenduduk = $jumlahLakiLaki + $jumlahPerempuan;

        return view('/index', [
            'sliders'          => Slider::all(),
            'beritas'          => Berita::where('status_id', 2)->latest()->take(3)->get(),
            'videoProfil'      => VideoProfil::first(),
            'kepalaDesa'       => PerangkatDesa::where('jabatan', 'Kepala Desa')->first(),
            'jumlahLakiLaki'   => $jumlahLakiLaki,
            'jumlahPerempuan'  => $jumlahPerempuan,
            'totalPenduduk'    => $totalPenduduk
        ]);
    }
}
