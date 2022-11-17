<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\AkunJurnalumum;
use App\Models\Jurnalumum;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function tampilNeracaSaldo()
    {
        //! Test untuk persiapan laba rugi
        // $akun = Akun::where('kode_rekening_id', '1')->first();
        // $test = $akun->akunjurnalumums->where('posisi_akun', 'Debet')->sum('nominal_jurnal') - $akun->akunjurnalumums->where('posisi_akun', 'Kredit')->sum('nominal_jurnal');
        // dd($test);
        //! Akhir Test
        return view('laporans.laporanNeracaSaldo', [
            'title' => 'Laporan',
            'akuns' => Akun::all(),
            'totalDebet' => Akun::where('kode_rekening_id', '1')->orWhere('kode_rekening_id', '5')->sum('saldo_akun'),
            'totalKredit' => Akun::where('kode_rekening_id', '2')->orWhere('kode_rekening_id', '3')->orWhere('kode_rekening_id', '4')->sum('saldo_akun'),
        ]);
    }

    public function tampilJurnalUmum()
    {
        return view('laporans.laporanJurnalUmum', [
            'title' => 'Laporan',
            'jurnalumums' => Jurnalumum::all(),
            'totalDebet' => AkunJurnalumum::where('posisi_akun', 'Debet')->sum('nominal_jurnal'),
            'totalKredit' => AkunJurnalumum::where('posisi_akun', 'Kredit')->sum('nominal_jurnal'),
        ]);
    }
}
