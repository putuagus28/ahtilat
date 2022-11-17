<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggans.index', [
            "title" => "Data Pelanggan",
            "pelanggans" => Pelanggan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggans.create', [
            'title' => 'Data Pelanggan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required|max:255',
            'notlp' => ['required', 'unique:pelanggans'],
            'email' => 'required|email:dns|unique:pelanggans',
            'catatan' => 'max:255',
        ]);

        Pelanggan::create($validatedData);

        return redirect('/pelanggans')->with('success', 'Pelanggan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggans.edit', [
            'title' => 'Data Pelanggan',
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required|max:255',
            'notlp' => ['required', "unique:pelanggans,notlp,$pelanggan->id"],
            'email' => "required|email:dns|unique:pelanggans,email,$pelanggan->id",
            'catatan' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Pelanggan::where('id', $pelanggan->id)->update($validatedData);

        return redirect('/pelanggans')->with('success', 'Pelanggan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
