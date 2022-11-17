<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produks.index', [
            "title" => "Data Produk",
            "produks" => Produk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produks.create', [
            'title' => "Data Produk",
            'kategoriproduks' => KategoriProduk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255|unique:produks',
            'satuan' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'max:255',
        ]);

        Produk::create($validatedData);

        return redirect('/produks')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('produks.edit', [
            'title' => "Data Produk",
            'produk' => $produk,
            'kategoriproduks' => KategoriProduk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama_produk' => "required|max:255|unique:produks,nama_produk,$produk->id",
            'satuan' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Produk::where('id', $produk->id)->update($validatedData);

        return redirect('/produks')->with('success', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
