<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnalumum;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJurnalumumRequest;
use App\Http\Requests\UpdateJurnalumumRequest;
use App\Models\AkunJurnalumum;

class JurnalumumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurnalumums.index', [
            'title' => 'Data Jurnal Umum',
            'jurnalumums' => Jurnalumum::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnalumums.create', [
            'title' => 'Data Jurnal Umum',
            'akuns' => Akun::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJurnalumumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Untuk menghitung jumlah akun debet yang diinput
        $x = count($request->id_akun_debet);

        // Untuk mendapatkan total nominal jurnal yang diinput
        $loop = 1;
        $total_jurnal = 0;
        foreach ($request->nominal_jurnal_debet as $key => $value) {
            $total_jurnal = $total_jurnal + $request->nominal_jurnal_debet[$key];
            $loop++;
            if ($loop == $x) {
                break;
            }
        }

        // Input data jurnal sekalian mendapatkan id dari data terakhir
        $id_jurnalumum = Jurnalumum::create([
            'tanggal_jurnal' => $request->tanggal_jurnal,
            'keterangan_jurnal' => $request->keterangan_jurnal,
            'jenis_aktivitas' => $request->jenis_aktivitas,
            'total_jurnal' => $total_jurnal,
        ])->id;

        // Looping untuk memasukan data debet duluan ke database
        $x = count($request->id_akun_debet);
        $loop = 1;
        foreach ($request->id_akun_debet as $key => $value) {
            AkunJurnalumum::create([
                'akun_id' => $request->id_akun_debet[$key],
                'jurnalumum_id' => $id_jurnalumum,
                'posisi_akun' => "Debet",
                'nominal_jurnal' => $request->nominal_jurnal_debet[$key]
            ]);

            $dataAkun = Akun::where('id', $request->id_akun_debet[$key])->first();

            if ($dataAkun->subsubkoderekenings->subkoderekenings->koderekenings->id == "1" || $dataAkun->subsubkoderekenings->subkoderekenings->koderekenings->id == "5") {
                Akun::where('id', $request->id_akun_debet[$key])->update([
                    'saldo_akun' => $dataAkun->saldo_akun + $request->nominal_jurnal_debet[$key],
                ]);
            } else {
                Akun::where('id', $request->id_akun_debet[$key])->update([
                    'saldo_akun' => $dataAkun->saldo_akun - $request->nominal_jurnal_debet[$key],
                ]);
            }

            $loop++;
            if ($loop == $x) {
                break;
            }
        }

        // Looping untuk memasukan data kredit setelah data debet dimasukan
        $x = count($request->id_akun_kredit);
        $loop = 1;
        foreach ($request->id_akun_kredit as $key => $value) {
            AkunJurnalumum::create([
                'akun_id' => $request->id_akun_kredit[$key],
                'jurnalumum_id' => $id_jurnalumum,
                'posisi_akun' => "Kredit",
                'nominal_jurnal' => $request->nominal_jurnal_kredit[$key]
            ]);

            $dataAkun = Akun::where('id', $request->id_akun_kredit[$key])->first();

            if ($dataAkun->subsubkoderekenings->subkoderekenings->koderekenings->id == "1") {
                Akun::where('id', $request->id_akun_kredit[$key])->update([
                    'saldo_akun' => $dataAkun->saldo_akun - $request->nominal_jurnal_kredit[$key],
                ]);
            } else {
                Akun::where('id', $request->id_akun_kredit[$key])->update([
                    'saldo_akun' => $dataAkun->saldo_akun + $request->nominal_jurnal_kredit[$key],
                ]);
            }

            $loop++;
            if ($loop == $x) {
                break;
            }
        }

        return redirect('/jurnalumums')->with('success', 'Jurnal berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJurnalumumRequest  $request
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJurnalumumRequest $request, Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnalumum $jurnalumum)
    {
        //
    }
}
