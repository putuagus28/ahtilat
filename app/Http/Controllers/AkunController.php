<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Models\SubKodeRekening;
use App\Models\SubSubKodeRekening;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('akuns.index', [
            "title" => "Data Akun",
            "akuns" => Akun::all()->sortBy('no_akun'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akuns/create', [
            "title" => "Data Akun",
            "subsubkoderekenings" => SubSubKodeRekening::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAkunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_akun' => 'required|max:255|unique:akuns',
            'no_akun' => 'required|unique:akuns',
            'sub_sub_kode_rekening_id' => 'required',
        ]);

        $sub_sub_kode_rekening = SubSubKodeRekening::where('id', $request->sub_sub_kode_rekening_id)->first();
        $validatedData['sub_kode_rekening_id'] = $sub_sub_kode_rekening->sub_kode_rekening_id;

        $sub_kode_rekening = SubKodeRekening::where('id', $sub_sub_kode_rekening->sub_kode_rekening_id)->first();
        $validatedData['kode_rekening_id'] = $sub_kode_rekening->kode_rekening_id;

        Akun::create($validatedData);

        return redirect('/akuns')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
        return view('akuns.edit', [
            'title' => "Data Akun",
            'akun' => $akun,
            'subsubkoderekenings' => SubSubKodeRekening::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAkunRequest  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akun $akun)
    {
        $rules = [
            'nama_akun' => "required|max:255|unique:akuns,nama_akun,$akun->id",
            'no_akun' => 'required',
            'sub_sub_kode_rekening_id' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $sub_sub_kode_rekening = SubSubKodeRekening::where('id', $request->sub_sub_kode_rekening_id)->first();
        $validatedData['sub_kode_rekening_id'] = $sub_sub_kode_rekening->sub_kode_rekening_id;

        $sub_kode_rekening = SubKodeRekening::where('id', $sub_sub_kode_rekening->sub_kode_rekening_id)->first();
        $validatedData['kode_rekening_id'] = $sub_kode_rekening->kode_rekening_id;

        Akun::where('id', $akun->id)->update($validatedData);

        return redirect('/akuns')->with('success', 'Akun berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akun $akun)
    {
        //
    }
}
